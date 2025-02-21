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

        MedHistory::create([
            'user_id' => Auth::id(),
            'medicine_name' => $request->medicine_name,
            'tablet_amount' => $request->tablet_amount,
            'remaining_tablets' => $request->remaining_tablets,
            'time' => $request->medicine_time,
            'date' => $request->medicine_date,
        ]);

        return redirect()->back()->with('success', 'Konsumsi obat berhasil dicatat!');
    }


    public function notif()
    {
        $userId = Auth::id();
        $alertFlag = null;

        $achivement90 = 90;
        $achievementNear90 = 85;

        $history = MedHistory::where('user_id', $userId)
            ->selectRaw('DATE(date) as tanggal') // Only select the date part, ignoring the time
            ->groupBy('tanggal') // Group by the distinct date
            ->pluck('tanggal') // Get only the distinct dates
            ->toArray();

        $total = count($history);

        // Check if the count of distinct dates equals 90
        if ($total == $achivement90) {
            $alertFlag = "MILESTONE_ACHIEVED";
        }else if ($total == $achievementNear90) {
            $alertFlag = "MILESTONE_NEAR_ACHIEVED";
        }

        // Return the alert flag as a JSON response
        return response()->json(['alertFlag' => $alertFlag]);
    }

}
