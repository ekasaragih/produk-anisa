<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HbRecord;
use Illuminate\Support\Facades\Auth;

class HbRecordController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kadar_hb' => 'required|numeric',
            'tanggal_cek' => 'required|date',
            'tempat_lokasi' => 'required|string|max:255',
        ]);

        // Determine anemia status
        $indicatedAnemia = $request->kadar_hb < 11 ? 'Anemia' : 'Tidak Anemia';

        HbRecord::create([
            'user_id' => Auth::id(),
            'kadar_hb' => $validated['kadar_hb'],
            'tanggal_cek' => $validated['tanggal_cek'],
            'tempat_lokasi' => $validated['tempat_lokasi'],
            'indicated_anemia' => $indicatedAnemia,
        ]);

        return redirect()->back()->with('success', 'Data Hb berhasil disimpan.');
    }
}
