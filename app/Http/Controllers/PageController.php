<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        return view("feature.dashboard", compact("user"));
    }

    public function alarm()
    {
        return view("feature.alarm");
    }


    public function riwayat_konsumsi()
    {
        return view("feature.riwayat_konsumsi");
    }
    
    public function certificate()
    {
        return view("feature.certificate");
    }

    public function kadar_hb()
    {
        return view("feature.kadar_hb");
    }

    public function contact_us()
    {
        return view("feature.contact_us");
    }
}
