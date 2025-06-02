<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function edukasi()
    {
        return view('admin.edukasi');
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