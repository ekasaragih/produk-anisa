<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Profile;
use App\Models\HbRecord;
use App\Models\MedHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profile = $user->profile;

        // Setting locale ke Bahasa Indonesia
        App::setLocale('id');
        Carbon::setLocale('id');

        $usia = $user->dob ? now()->year - Carbon::parse($user->dob)->year : null;

        $lastUpdated = $profile->updated_at 
            ? Carbon::parse($profile->updated_at)->translatedFormat('d F Y, H:i') 
            : null;

        // --- 1. Ambil informasi kadar Hb terbaru ---
        $latestHb = HbRecord::where('user_id', $user->id)
            ->orderBy('tanggal_cek', 'desc')
            ->first();

        $kadarHbInfo = $latestHb 
            ? $latestHb->kadar_hb . ' g/dL pada ' . Carbon::parse($latestHb->tanggal_cek)->translatedFormat('d M Y') 
            : 'Belum ada data';

        // --- Riwayat pencapaian Hb ---
        $hbRecords = HbRecord::where('user_id', $user->id)->get();
        $hbTertinggi = $hbRecords->max('kadar_hb') ?? 'Belum ada data';
        $hbTerendah = $hbRecords->min('kadar_hb') ?? 'Belum ada data';
        $totalPemeriksaanHb = $hbRecords->count();

        // --- Tracking konsumsi Fe ---
        $medRecords = MedHistory::where('user_id', $user->id)->orderBy('date', 'asc')->get();
        $daysWithMedication = $medRecords->unique('date')->count();
        $streaks = $medRecords->groupBy('date')->count();

        // Cek streak Hb ≥ 11 g/dL selama 7 & 30 hari
        $hbNormalStreak7 = $hbRecords->where('kadar_hb', '>=', 11)->sortByDesc('tanggal_cek')->take(7)->count() == 7;
        $hbNormalStreak30 = $hbRecords->where('kadar_hb', '>=', 11)->sortByDesc('tanggal_cek')->take(30)->count() == 30;
        $hbNormalStreak60 = $hbRecords->where('kadar_hb', '>=', 11)->sortByDesc('tanggal_cek')->take(60)->count() == 60;


        // --- 3. Ambil data dari med_history untuk Tantangan Konsumsi Fe 90 Hari ---
        $firstFeRecord = MedHistory::where('user_id', $user->id)
            ->orderBy('date', 'asc')
            ->first();

        $totalDays = 90;
        $daysCompleted = 0;
        $daysWithMedication = 0;

        if ($firstFeRecord) {
            $startDate = Carbon::parse($firstFeRecord->date);
            
            $medRecords = MedHistory::where('user_id', $user->id)
                ->whereBetween('date', [$startDate, $startDate->copy()->addDays($totalDays)])
                ->selectRaw('DATE(date) as unique_date')
                ->distinct()
                ->get();
            
            $daysWithMedication = $medRecords->count();
            
            $daysCompleted = min(max($daysWithMedication, 0), $totalDays);
        }

        $progressFe90 = ($daysCompleted / $totalDays) * 100;

        // Calculate badge statuses
        $badges = [
            [
                'name' => 'Pejuang Fe (30 Hari)',
                'description' => 'Rutin mengonsumsi tablet Fe selama 30 hari.',
                'icon' => '🏅',
                'unlocked' => $daysWithMedication >= 30,
                'date_earned' => $daysWithMedication >= 30 ? Carbon::now()->format('d M Y') : null,
                'requirement' => 'Konsumsi tablet Fe setiap hari selama 30 hari.'
            ],
            [
                'name' => 'Streak Sehat (7 Hari)',
                'description' => 'Menjaga kadar Hb normal selama 7 hari berturut-turut.',
                'icon' => '💪',
                'unlocked' => $hbNormalStreak7,
                'date_earned' => $hbNormalStreak7 ? Carbon::now()->format('d M Y') : null,
                'requirement' => 'Jaga kadar Hb ≥ 11 g/dL selama 7 hari berturut-turut.'
            ],
            [
                'name' => 'Bintang Pagi (Log Tepat Waktu)',
                'description' => 'Mencatat konsumsi tablet tepat waktu selama 14 hari.',
                'icon' => '🌞',
                'unlocked' => $streaks >= 14,
                'date_earned' => $streaks >= 14 ? Carbon::now()->format('d M Y') : null,
                'requirement' => 'Catat konsumsi tablet Fe tepat waktu selama 14 hari berturut-turut.'
            ],
            [
                'name' => 'Pahlawan Hb (Bebas Anemia)',
                'description' => 'Menjaga kadar Hb normal selama 1 bulan penuh.',
                'icon' => '❤️',
                'unlocked' => $hbNormalStreak30,
                'date_earned' => $hbNormalStreak30 ? Carbon::now()->format('d M Y') : null,
                'requirement' => 'Jaga kadar Hb ≥ 11 g/dL selama 30 hari berturut-turut.'
            ],
            [
                'name' => 'Detektor Dini (Rutin Cek Hb)',
                'description' => 'Melakukan pencatatan kadar Hb minimal 3 kali dalam sebulan.',
                'icon' => '🩸',
                'unlocked' => $totalPemeriksaanHb >= 3,
                'date_earned' => $totalPemeriksaanHb >= 3 ? Carbon::now()->format('d M Y') : null,
                'requirement' => 'Lakukan pemeriksaan Hb minimal 3 kali dalam satu bulan.'
            ],
            [
                'name' => 'Juara 90 Hari (Tantangan Selesai)',
                'description' => 'Menyelesaikan tantangan konsumsi tablet Fe selama 90 hari.',
                'icon' => '🏆',
                'unlocked' => $daysWithMedication >= 90,
                'date_earned' => $daysWithMedication >= 90 ? Carbon::now()->format('d M Y') : null,
                'requirement' => 'Konsumsi tablet Fe setiap hari selama 90 hari berturut-turut.'
            ],
            [
                'name' => 'Ibu Teladan (Tanpa Absen)',
                'description' => 'Tidak pernah melewatkan konsumsi tablet selama 1 bulan penuh.',
                'icon' => '🤰',
                'unlocked' => $daysWithMedication >= 30 && $streaks == 30,
                'date_earned' => ($daysWithMedication >= 30 && $streaks == 30) ? Carbon::now()->format('d M Y') : null,
                'requirement' => 'Tidak boleh absen konsumsi tablet Fe selama 30 hari.'
            ],
            [
                'name' => 'Pelacak Kesehatan (Pengguna Aktif)',
                'description' => 'Rutin mencatat log kesehatan selama 30 hari.',
                'icon' => '📈',
                'unlocked' => $streaks >= 30,
                'date_earned' => $streaks >= 30 ? Carbon::now()->format('d M Y') : null,
                'requirement' => 'Mencatat log kesehatan selama 30 hari berturut-turut.'
            ],
            [
                'name' => 'Penjaga Kesehatan (Bebas Anemia 2 Bulan)',
                'description' => 'Menjaga kadar Hb normal selama 60 hari berturut-turut.',
                'icon' => '💎',
                'unlocked' => $hbNormalStreak60,
                'date_earned' => $hbNormalStreak60 ? Carbon::now()->format('d M Y') : null,
                'requirement' => 'Jaga kadar Hb ≥ 11 g/dL selama 60 hari berturut-turut.'
            ]
        ];


         // --- Statistik Badges ---
        $totalBadges = count($badges);
        $earnedBadges = count(array_filter($badges, fn($badge) => $badge['unlocked']));
        $latestBadge = collect($badges)->where('unlocked', true)->sortByDesc('date_earned')->first();
        $nextBadge = collect($badges)->where('unlocked', false)->first();

        // Ambil data Hb dalam 7 hari terakhir
        $hbRecords = HbRecord::where('user_id', $user->id)
            ->whereDate('tanggal_cek', '>=', now()->subDays(7))
            ->orderBy('tanggal_cek', 'asc')
            ->pluck('kadar_hb')
            ->toArray();

        // Hitung jumlah hari berturut-turut dengan Hb ≥ 11 g/dL
        $streak_hb = 0;
        foreach ($hbRecords as $hb) {
            if ($hb >= 11) {
                $streak_hb++;
            } else {
                $streak_hb = 0;
            }
        }

        // Progress tantangan bebas anemia 1 minggu
        $anemiaFreeWeekProgress = min($streak_hb, 7);
        $anemiaFreeWeekPercentage = ($anemiaFreeWeekProgress / 7) * 100;

        // Calculate active challenge progress
        $activeChallenge = [
            'fe_90_days' => [
                'name' => 'Tantangan Konsumsi Fe 90 Hari',
                'progress' => $daysCompleted,
                'total' => 90,
                'percentage' => ($daysCompleted / 90) * 100
            ],
            'anemia_free_week' => [
                'name' => 'Tantangan Bebas Anemia 1 Minggu',
                'progress' => $anemiaFreeWeekProgress,
                'total' => 7,
                'percentage' => $anemiaFreeWeekPercentage
            ]
        ];

        // --- 4. Koleksi Badge atau Medali Virtual ---
        $certificates = [
            ['title' => 'Tantangan 90 Hari Konsumsi Fe', 'date' => '13 Februari 2025', 'download_link' => '#'],
            ['title' => 'Bebas Anemia 2 Bulan', 'date' => '20 Januari 2025', 'download_link' => '#'],
        ];

        // --- 5. Motivasi berdasarkan pencapaian ---
        $motivations = [];

        if ($daysWithMedication >= 10) {
            $motivations[] = "Mantap! Anda sudah meminum suplemen Fe selama 10 hari. Teruskan kebiasaan baik ini! 💪";
        }

        if ($daysWithMedication >= 30) {
            $motivations[] = "Selamat! Anda sudah 1 bulan rutin minum Fe. Pertahankan pola makan sehat dan tetap semangat! 🎉";
        }

        if ($daysWithMedication >= 60) {
            $motivations[] = "Luar biasa! Anda sudah melewati 60 hari. Tinggal sedikit lagi menuju target! 🚀";
        }

        if ($daysWithMedication >= 90) {
            $motivations[] = "🎉 Anda telah menyelesaikan Tantangan 90 Hari Konsumsi Fe! Konsistensi Anda luar biasa! Tetap jaga kesehatan! 🎖️";
        } else {
            $remainingDays = 90 - $daysWithMedication;
            $motivations[] = "Ayo, tinggal $remainingDays hari lagi untuk menyelesaikan tantangan konsumsi Fe 90 hari! 💊🔥";
        }

        return view('feature.profile', compact(
            'profile',
            'usia',
            'lastUpdated', 
            'kadarHbInfo', 
            'hbTertinggi', 
            'hbTerendah', 
            'totalPemeriksaanHb', 
            'daysCompleted', 
            'progressFe90', 
            'badges',
            'totalBadges',
            'earnedBadges',
            'latestBadge',
            'nextBadge',
            'activeChallenge',
            'certificates', 
            'motivations'
        ));
    }

    public function update(Request $request, $id) {
        $profile = Profile::where('user_id', Auth::id())->firstOrFail();

        $request->validate([
            'nama' => 'nullable|string',
            'pendidikan' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'hamil_ke' => 'nullable|integer|min:1',
            'hpht' => 'nullable|date',
            'bb_sebelum_hamil' => 'nullable|numeric|min:30',
            'bb_sekarang' => 'nullable|numeric|min:30',
            'kadar_hb' => 'nullable|numeric|min:7|max:15',
            'masalah_kehamilan' => 'nullable|string',
        ]);

        $profile->update($request->all());

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }

    public function updateDosis(Request $request)
    {
        $request->validate([
            'dosis_obat_fe' => 'required|integer|min:1',
        ]);

        $profile = Profile::where('user_id', Auth::id())->firstOrFail();
        $profile->update([
            'dosis_obat_fe' => $request->dosis_obat_fe,
        ]);

        return redirect()->back()->with('success', 'Dosis berhasil diperbarui!');
    }
}