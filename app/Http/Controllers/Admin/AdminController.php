<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KuesionerPretest;

class AdminController extends Controller
{
    public function edukasi()
    {
        $kuesioners = KuesionerPretest::with(['user.profile'])->get();
        return view('admin.edukasi', compact('kuesioners'));
    }

    public function preventif()
    {
        return view('admin.preventif');
    }

    public function progress()
    {
        return view('admin.progress');
    }
}