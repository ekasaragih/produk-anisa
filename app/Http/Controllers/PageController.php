<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HbRecord;
use App\Models\MedHistory;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function tingkat_pengetahuan_ibu_hamil()
    {
        return view("tingkat_pengetahuan_ibu_hamil");
    }

    public function promotive()
    {
        return view("feature.promotive");
    }

    public function preventive()
    {
        return view("feature.preventive");
    }

    public function dashboard()
    {
        $user = Auth::user();

        // Ambil data Hb terakhir
        $latestHb = HbRecord::where('user_id', $user->id)
                            ->latest('tanggal_cek')
                            ->first();

        // Hitung total tablet diminum hari ini
        $totalTabletHarian = MedHistory::where('user_id', $user->id)
            ->whereDate('date', today())
            ->sum('tablet_amount');

        $dosisHarian = $user->profile->dosis_obat_fe ?? 0;

        // Hitung total tablet diminum per hari dalam seminggu terakhir
        $weeklyProgress = MedHistory::where('user_id', $user->id)
            ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
            ->selectRaw('DAYNAME(date) as hari, SUM(tablet_amount) as total')
            ->groupBy('hari')
            ->orderByRaw("FIELD(hari, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')")
            ->pluck('total', 'hari');

        // Hitung total tablet diminum per minggu dalam sebulan terakhir
        $monthlyProgress = MedHistory::where('user_id', $user->id)
            ->whereBetween('date', [now()->startOfMonth(), now()->endOfMonth()])
            ->selectRaw('WEEK(date) - WEEK(DATE_SUB(date, INTERVAL DAYOFMONTH(date)-1 DAY)) + 1 as minggu, SUM(tablet_amount) as total')
            ->groupBy('minggu')
            ->orderBy('minggu')
            ->pluck('total', 'minggu');

        return view('feature.dashboard', compact(
            'user', 'latestHb', 'totalTabletHarian', 'dosisHarian', 'weeklyProgress', 'monthlyProgress'
        ));
    }

    public function alarm()
    {
        return view("feature.alarm");
    }
    
    public function certificate()
    {
        return view("feature.certificate");
    }

    public function contact_us()
    {
        return view("feature.contact_us");
    }
}
