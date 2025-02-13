<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\User;
use Carbon\Carbon;
use App\Models\HbRecord;
use Illuminate\Support\Facades\App;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $profile = $user->profile;

        App::setLocale('id');
        Carbon::setLocale('id');

        $usia = $user->dob ? now()->year - Carbon::parse($user->dob)->year : null;

        $lastUpdated = $profile->updated_at 
            ? Carbon::parse($profile->updated_at)->translatedFormat('d F Y, H:i') 
            : null;

        $latestHb = HbRecord::where('user_id', $user->id)
            ->orderBy('tanggal_cek', 'desc')
            ->first();

        $kadarHbInfo = $latestHb 
            ? $latestHb->kadar_hb . ' g/dL pada ' . Carbon::parse($latestHb->tanggal_cek)->translatedFormat('d M Y') 
            : 'Belum ada data';

        return view('feature.profile', compact('profile', 'usia', 'lastUpdated', 'kadarHbInfo'));
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
