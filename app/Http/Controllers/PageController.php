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
        $latestHb = HbRecord::where('user_id', $user->id)
                        ->latest('tanggal_cek')
                        ->first();

        $totalTabletHarian = MedHistory::where('user_id', $user->id)
            ->whereDate('date', today())
            ->sum('tablet_amount');

        $dosisHarian = $user->profile->dosis_obat_fe ?? 0;

        return view('feature.dashboard', compact('user', 'latestHb', 'totalTabletHarian', 'dosisHarian'));
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
