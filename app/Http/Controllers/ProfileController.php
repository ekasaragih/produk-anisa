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

        // --- 2. Riwayat pencapaian Hb ---
        $hbRecords = HbRecord::where('user_id', $user->id)->get();

        $hbTertinggi = $hbRecords->max('kadar_hb') ?? 'Belum ada data';
        $hbTerendah = $hbRecords->min('kadar_hb') ?? 'Belum ada data';
        $totalPemeriksaanHb = $hbRecords->count();

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


        // --- 4. Koleksi Badge atau Medali Virtual ---
        $badges = [
            ['name' => 'Juara 90 Hari – Konsumsi Fe 90 Hari', 'unlocked' => $daysCompleted >= 90, 'icon' => '🏆'],
            ['name' => 'Pejuang Fe (30 Hari)', 'unlocked' => $daysCompleted >= 30, 'icon' => '💪'],
            ['name' => 'Detektor Dini (3x Cek Hb)', 'unlocked' => $totalPemeriksaanHb >= 3, 'icon' => '🩸'],
        ];

        // --- 5. Sertifikat yang Dimiliki (contoh sertifikat hardcoded) ---
        $certificates = [
            ['title' => 'Tantangan 90 Hari Konsumsi Fe', 'date' => '13 Februari 2025', 'download_link' => '#'],
            ['title' => 'Bebas Anemia 2 Bulan', 'date' => '20 Januari 2025', 'download_link' => '#'],
        ];

        // --- 6. Motivasi berdasarkan pencapaian ---
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
