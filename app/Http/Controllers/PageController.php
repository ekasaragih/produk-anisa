<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HbRecord;
use App\Models\MedHistory;
use App\Models\KuesionerPretest;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function welcome()
    {
        return view("welcome");
    }

    public function tingkat_pengetahuan_ibu_hamil()
    {
        if (Auth::check()) {
            $latestResult = KuesionerPretest::where('user_id', Auth::id())
                                ->orderByDesc('created_at')
                                ->first();
            return view("tingkat_pengetahuan_ibu_hamil", compact('latestResult'));
        }

        return view("tingkat_pengetahuan_ibu_hamil");
    }

    public function submitQuiz(Request $request)
    {
        $correctAnswers = [
            'q1' => 'b', 'q2' => 'a', 'q3' => 'c', 'q4' => 'a', 'q5' => 'b',
            'q6' => 'c', 'q7' => 'c', 'q8' => 'c', 'q9' => 'a', 'q10' => 'a',
            'q11' => 'a', 'q12' => 'a', 'q13' => 'a', 'q14' => 'a', 'q15' => 'b',
            'q16' => 'b', 'q17' => 'a', 'q18' => 'a', 'q19' => 'a', 'q20' => 'a'
        ];

        $score = 0;
        $userAnswers = [];

        // Loop through all questions (q1 to q20) and collect user's answers
        for ($i = 1; $i <= 20; $i++) {
            $questionKey = 'q' . $i;
            $userAnswer = $request->input($questionKey);
            $userAnswers[$questionKey] = $userAnswer; // Store the user's answer

            if ($userAnswer === $correctAnswers[$questionKey]) {
                $score++;
            }
        }

        // Store the result if the user is logged in
        if (Auth::check()) {
            KuesionerPretest::create([
                'user_id' => Auth::id(),
                'score' => $score,
                'answers' => $userAnswers, // Storing all user answers as JSON
            ]);
        }

        // Determine the knowledge level based on the score
        $knowledgeLevel = '';
        if ($score >= 17) {
            $knowledgeLevel = 'Sangat Baik';
        } else if ($score >= 13) {
            $knowledgeLevel = 'Cukup Baik';
        } else {
            $knowledgeLevel = 'Kurang';
        }

        // You can return the result directly or redirect back with a flash message
        return redirect()->route('edukasi')->with([
            'quiz_score' => $score,
            'knowledge_level' => $knowledgeLevel,
            'user_answers' => $userAnswers, // Pass user answers back to display
            'correct_answers' => $correctAnswers, // Pass correct answers for comparison
        ]);
    }

    public function promotive()
    {
        return view("feature.promotive");
    }

    public function preventive()
    {
        return view("feature.preventive");
    }

    public function dashboard()
    {
        $user = Auth::user();

        // Ambil data Hb terakhir
        $latestHb = HbRecord::where('user_id', $user->id)
                            ->latest('tanggal_cek')
                            ->first();

        // Hitung total tablet diminum hari ini
        $totalTabletHarian = MedHistory::where('user_id', $user->id)
            ->whereDate('date', today())
            ->sum('tablet_amount');

        $dosisHarian = $user->profile->dosis_obat_fe ?? 0;

        // Hitung total tablet diminum per hari dalam seminggu terakhir
        $weeklyProgress = MedHistory::where('user_id', $user->id)
            ->whereBetween('date', [now()->startOfWeek(), now()->endOfWeek()])
            ->selectRaw('DAYNAME(date) as hari, SUM(tablet_amount) as total')
            ->groupBy('hari')
            ->orderByRaw("FIELD(hari, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')")
            ->pluck('total', 'hari');

        // Hitung total tablet diminum per minggu dalam sebulan terakhir
        $monthlyProgress = MedHistory::where('user_id', $user->id)
            ->whereBetween('date', [now()->startOfMonth(), now()->endOfMonth()])
            ->selectRaw('WEEK(date) - WEEK(DATE_SUB(date, INTERVAL DAYOFMONTH(date)-1 DAY)) + 1 as minggu, SUM(tablet_amount) as total')
            ->groupBy('minggu')
            ->orderBy('minggu')
            ->pluck('total', 'minggu');

        return view('feature.dashboard', compact(
            'user', 'latestHb', 'totalTabletHarian', 'dosisHarian', 'weeklyProgress', 'monthlyProgress'
        ));
    }

    public function alarm()
    {
        return view("feature.alarm");
    }
    
    public function certificate()
    {
        return view("feature.certificate");
    }

    public function contact_us()
    {
        return view("feature.contact_us");
    }
}
