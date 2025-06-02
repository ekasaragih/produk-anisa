<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\KuesionerPretest;
use App\Models\KuesionerPreventive;
use App\Models\MedHistory;
use App\Models\User;
use Carbon\Carbon;  

class AdminController extends Controller
{
    public function edukasi()
    {
        $kuesioners = KuesionerPretest::with(['user.profile'])->get();
        return view('admin.edukasi', compact('kuesioners'));
    }

    public function preventif()
    {
         $kuesioners = KuesionerPreventive::with('user.profile')->get();
        return view('admin.preventif', compact('kuesioners'));
    }

    public function progress()
    {
        $users = User::with([
            'profile',
            'medHistories' => function($query) {
                $query->orderBy('date', 'desc')->orderBy('time', 'desc');
            },
            'hbRecords' => function($query) { // Eager load HB records
                $query->orderBy('tanggal_cek', 'desc'); // Order by check date to get the latest
            }
        ])->get();

        // Prepare additional data for each user before passing to the view
        $users->each(function ($user) {
            // Get the latest medical history for the user
            $user->latest_med_history = $user->medHistories->first();

            // Get the latest HB record for the user
            $user->latest_hb_record = $user->hbRecords->first();

            // Prepare HB status and class based on the latest HB record
            // Attach these properties directly to the user object for easier access in Alpine.js
            if ($user->latest_hb_record && $user->latest_hb_record->kadar_hb !== null) {
                $kadar_hb = $user->latest_hb_record->kadar_hb;
                $user->latest_hb_status_text = '';
                $user->latest_hb_status_class = '';

                if ($kadar_hb < 11) {
                    $user->latest_hb_status_text = 'Anemia';
                    $user->latest_hb_status_class = 'text-red-500'; // Define these Tailwind classes in your CSS if not already
                } elseif ($kadar_hb >= 11 && $kadar_hb <= 12) {
                    $user->latest_hb_status_text = 'Normal Rendah';
                    $user->latest_hb_status_class = 'text-yellow-500';
                } else {
                    $user->latest_hb_status_text = 'Normal';
                    $user->latest_hb_status_class = 'text-green-500';
                }
            } else {
                // Set default/null values if no latest HB record or kadar_hb data
                $user->latest_hb_status_text = null;
                $user->latest_hb_status_class = null;
            }
        });

        return view('admin.progress', compact('users'));
    }
}