<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Response;
use App\Models\Question;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalRespondents = Response::distinct('user_id')->count('user_id');
        $totalQuestions = Question::count();
        $totalRespondentUsers = User::role('responden')->count();

        // Bar chart: Top 5 answers
        $topResponses = Response::select('response', DB::raw('count(*) as count'))
            ->groupBy('response')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();

        // Hourly survey statistics for a specific date
        $date = $request->input('date', Carbon::today()->toDateString());
        $hourlyStats = Response::whereDate('created_at', $date)
            ->select(DB::raw('HOUR(created_at) as hour'), DB::raw('count(*) as count'))
            ->groupBy('hour')
            ->get()
            ->pluck('count', 'hour')
            ->toArray();

        // Fill in missing hours with 0
        $hourlyStats = array_replace(array_fill(0, 24, 0), $hourlyStats);

        return view('dashboard.index', compact(
            'totalRespondents', 'totalQuestions', 'totalRespondentUsers', 'topResponses', 'hourlyStats', 'date'
        ));
    }

}
