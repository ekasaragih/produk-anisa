<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view("feature.dashboard");
    }

    public function riwayat_konsumsi()
    {
        return view("feature.riwayat_konsumsi");
    }
    
    public function certificate()
    {
        return view("feature.certificate");
    }

    public function input_kadar_hb()
    {
        return view("feature.input_kadar_hb");
    }

    public function contact_us()
    {
        return view("feature.contact_us");
    }
}
