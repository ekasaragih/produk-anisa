<?php

namespace App\Http\Controllers;

use App\Models\MedHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedHistoryController extends Controller
{
    public function riwayat_konsumsi()
    {
        $history = MedHistory::where('user_id', Auth::id())
            ->selectRaw('DATE(date) as tanggal, COUNT(*) as jumlah')
            ->groupBy('tanggal')
            ->get();

        return view("feature.riwayat_konsumsi", compact('history'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'medicine_name' => 'required|string',
            'tablet_amount' => 'required|integer|min:1',
            'remaining_tablets' => 'required|integer|min:0',
            'medicine_time' => 'required',
            'medicine_date' => 'required|date',
        ]);

        // Simpan data ke database
        MedHistory::create([
            'user_id' => Auth::id(),
            'medicine_name' => $request->medicine_name,
            'tablet_amount' => $request->tablet_amount,
            'remaining_tablets' => $request->remaining_tablets,
            'time' => $request->medicine_time,
            'date' => $request->medicine_date,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Konsumsi obat berhasil dicatat!');
    }
}
