<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alarm;

class AlarmController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'nullable|date',
            'jam' => 'required',
            'hari' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'snooze' => 'required|integer|min:0',
            'max_snooze' => 'required|integer|min:1',
            'aktif' => 'required|in:yes,no',
        ]);

        // Logika: Jika hari dipilih, tanggal dikosongkan
        $tanggal = $request->hari ? null : $request->tanggal;

        Alarm::create([
            'tanggal' => $tanggal,
            'jam' => $request->jam,
            'hari' => $request->hari,
            'deskripsi' => $request->deskripsi,
            'snooze' => $request->snooze,
            'max_snooze' => $request->max_snooze,
            'aktif' => $request->aktif
        ]);

        return response()->json(['message' => 'Alarm berhasil ditambahkan'], 201);
    }
}
