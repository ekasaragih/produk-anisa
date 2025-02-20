<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alarm;
use Illuminate\Support\Facades\Auth;

class AlarmController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $alarms = Alarm::where('user_id', $userId)->get();
        return response()->json($alarms);
    }

    public function show($id)
    {
        $alarm = Alarm::findOrFail($id);
        return response()->json($alarm);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'nullable|date',
            'nama_alarm' => 'required|string',
            'jam' => 'required',
            'hari' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'snooze' => 'required|integer|min:0',
            'max_snooze' => 'required|integer|min:1',
            'aktif' => 'required|in:yes,no',
        ]);

        $tanggal = $request->hari ? null : $request->tanggal;

        Alarm::create([
            'user_id' => Auth::id(),
            'tanggal' => $tanggal,
            'nama_alarm' => $request->nama_alarm,
            'jam' => $request->jam,
            'hari' => $request->hari,
            'deskripsi' => $request->deskripsi,
            'snooze' => $request->snooze,
            'max_snooze' => $request->max_snooze,
            'aktif' => $request->aktif
        ]);

        return response()->json(['message' => 'Alarm berhasil ditambahkan'], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama_alarm' => 'required|string|max:255',
            'jam' => 'required',
            'hari' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'snooze' => 'required|integer|min:1',
            'max_snooze' => 'required|integer|min:1',
        ]);

        $alarm = Alarm::findOrFail($id);
        $alarm->update([
            'tanggal' => $request->tanggal,
            'nama_alarm' => $request->nama_alarm,
            'jam' => $request->jam,
            'hari' => $request->hari,
            'deskripsi' => $request->deskripsi,
            'snooze' => $request->snooze,
            'max_snooze' => $request->max_snooze,
        ]);

        return response()->json(['message' => 'Alarm berhasil diperbarui!']);
    }


    public function destroy($id)
    {
        $alarm = Alarm::findOrFail($id);
        $alarm->delete();

        return response()->json(['message' => 'Alarm berhasil dihapus!']);
    }

    public function toggleActive($id)
    {
        $alarm = Alarm::findOrFail($id);
        $alarm->aktif = $alarm->aktif === 'yes' ? 'no' : 'yes';
        $alarm->save();

        return response()->json(['message' => 'Status alarm diperbarui!', 'aktif' => $alarm->aktif]);
    }
}
