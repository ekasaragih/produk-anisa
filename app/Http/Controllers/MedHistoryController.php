<?php

namespace App\Http\Controllers;

use App\Models\MedHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MedHistoryController extends Controller
{
    public function riwayat_konsumsi()
    {
        $userId = Auth::id();
        $startDate = now()->subDays(30)->toDateString();
        $endDate = now()->toDateString();

        $history = MedHistory::where('user_id', $userId)
            ->selectRaw('DATE(date) as tanggal, COUNT(*) as jumlah')
            ->groupBy('tanggal')
            ->pluck('jumlah', 'tanggal')
            ->toArray();

        $allDates = [];
        $currentDate = \Carbon\Carbon::parse($startDate);

        while ($currentDate->lte($endDate)) {
            $dateStr = $currentDate->toDateString();
            $jumlah = isset($history[$dateStr]) ? $history[$dateStr] : 0;

            $allDates[] = [
                'tanggal' => $dateStr,
                'status' => $jumlah > 0 ? 'Minum Obat' : 'Tidak Minum Obat',
                'jumlah' => $jumlah
            ];
            $currentDate->addDay();
        }

        return view("feature.riwayat_konsumsi", ['history' => $allDates]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'medicine_name' => 'string',
            'tablet_amount' => 'required|integer|min:1',
            'remaining_tablets' => 'required|integer|min:0',
            'medicine_time' => 'required',
            'medicine_date' => 'required|date',
        ]);

        $medHistory = MedHistory::create([
            'user_id' => Auth::id(),
            'medicine_name' => $request->medicine_name,
            'tablet_amount' => $request->tablet_amount,
            'remaining_tablets' => $request->remaining_tablets,
            'time' => $request->medicine_time,
            'date' => $request->medicine_date,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $medHistory,
        ], 201);
    }

    public function notif()
    {
        $userId = Auth::id();
        $alertFlag = null;

        $achivement90 = 90;
        $achievementNear90 = 85;

        $history = MedHistory::where('user_id', $userId)
            ->selectRaw('DATE(date) as tanggal')
            ->groupBy('tanggal')
            ->pluck('tanggal') 
            ->toArray();

        $total = count($history);

        if ($total == $achivement90) {
            $alertFlag = "MILESTONE_ACHIEVED";
        }else if ($total == $achievementNear90) {
            $alertFlag = "MILESTONE_NEAR_ACHIEVED";
        }

        return response()->json(['alertFlag' => $alertFlag]);
    }

}
