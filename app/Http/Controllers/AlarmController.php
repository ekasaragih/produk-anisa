<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alarm;
use Carbon\Carbon;
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
            'is_90_days' => 'nullable|boolean',  // checkbox input
        ]);

        if ($request->is_90_days) {
            // Jika opsi 90 hari aktif, tanggal dikosongkan, hari set "Setiap Hari"
            $tanggal = null;
            $hari = 'Setiap Hari';
        } else {
            $hari = $request->hari;
            $tanggal = $request->hari ? null : $request->tanggal;
        }

        Alarm::create([
            'user_id' => Auth::id(),
            'tanggal' => $tanggal,
            'nama_alarm' => $request->nama_alarm,
            'jam' => $request->jam,
            'hari' => $hari,
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

    public function upcomingAlarms()
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        $now = Carbon::now('Asia/Jakarta');
        $fiveMinutesLater = $now->copy()->addMinutes(10);
        $today = $now->toDateString();
        $currentDay = $now->translatedFormat('l');

        $alarms = Alarm::where('user_id', $user->id)
            ->where('aktif', 'yes')
            ->where(function ($query) use ($today, $currentDay) {
                $query->where('tanggal', $today)
                    ->orWhere('hari', 'LIKE', "%$currentDay%")
                    ->orWhere('hari', 'LIKE', "%Setiap Hari%");
            })
            ->where(function ($query) use ($now) {
                $query->whereNull('dismissed_at')
                    ->orWhereDate('dismissed_at', '!=', $now->toDateString());
            })
            ->where(function ($query) use ($now) {
                $query->whereNull('snooze_until')
                    ->orWhere('snooze_until', '<=', $now);
            })
            ->whereBetween('jam', [$now->format('H:i:s'), $fiveMinutesLater->format('H:i:s')])
            ->get();

        return response()->json($alarms);
    }

    public function dismissAlarm($id)
    {
        $user = Auth::user();
        $alarm = Alarm::where('id', $id)->where('user_id', $user->id)->first();

        if (!$alarm) {
            return response()->json(['message' => 'Alarm not found'], 404);
        }

        $alarm->update(['dismissed_at' => Carbon::now('Asia/Jakarta')]);

        return response()->json(['message' => 'Alarm dismissed for today']);
    }

    public function snoozeAlarm($id)
    {
        $user = Auth::user();
        $alarm = Alarm::where('id', $id)->where('user_id', $user->id)->first();

        if (!$alarm) {
            return response()->json(['message' => 'Alarm not found'], 404);
        }

        if ($alarm->max_snooze <= 0) {
            return response()->json(['message' => 'Snooze limit reached'], 400);
        }

        $newSnoozeTime = Carbon::now('Asia/Jakarta')->addMinutes($alarm->snooze);
        $alarm->update([
            'snooze_until' => $newSnoozeTime,
            'max_snooze' => $alarm->max_snooze - 1
        ]);

        return response()->json(['message' => 'Alarm snoozed until ' . $newSnoozeTime->toTimeString()]);
    }

}
