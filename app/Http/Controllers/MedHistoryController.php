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
            $allDates[] = [
                'tanggal' => $dateStr,
                'status' => isset($history[$dateStr]) ? 'Minum Obat' : 'Tidak Minum Obat'
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

         // Cegah duplikasi pencatatan pada hari yang sama
         $exists = MedHistory::where('user_id', Auth::id())
         ->whereDate('date', $request->medicine_date)
         ->exists();

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
}
