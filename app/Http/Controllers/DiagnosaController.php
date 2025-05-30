<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Diagnosa;

class DiagnosaController extends Controller
{
    // TO-DO: Get diagnosa list for users

    public function store(Request $request)
    {
        $symptoms = $request->input('symptoms', []);
        $count = count($symptoms);

        // Penilaian diagnosa
        if ($count >= 6) {
            $diagnose = 'Anemia Berat';
        } elseif ($count >= 4) {
            $diagnose = 'Anemia Sedang';
        } elseif ($count >= 2) {
            $diagnose = 'Anemia Ringan';
        } else {
            $diagnose = 'Tidak Anemia';
        }

        Diagnosa::create([
            'user_id' => Auth::id(),
            'diagnose_result' => $diagnose,
            'symptom_checks' => json_encode($symptoms),
        ]);

        return redirect()->back()->with('success', 'Diagnosa berhasil disimpan!');
    }
}
