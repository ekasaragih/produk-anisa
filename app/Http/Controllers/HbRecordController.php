<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HbRecord;
use Illuminate\Support\Facades\Auth;

class HbRecordController extends Controller
{
    
    public function kadar_hb()
    {
        $hbRecords = HbRecord::orderBy('tanggal_cek', 'desc')->get();
        $latestHb = HbRecord::orderBy('tanggal_cek', 'desc')->first();
        $hbRecordCount = $hbRecords->count();

        $recentHbRecords = HbRecord::orderBy('tanggal_cek', 'desc')
                               ->take(3)
                               ->pluck('indicated_anemia')
                               ->toArray();
        
        $stillAnemia = count($recentHbRecords) === 3 && 
                   array_unique($recentHbRecords) === ['Anemia'];

        return view('feature.kadar_hb', compact('hbRecords', 'latestHb', 'hbRecordCount', 'stillAnemia'));
    }

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
