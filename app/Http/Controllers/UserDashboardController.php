<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        // Get the start and end dates of the current week
        $weekStart = Carbon::now()->startOfWeek();
        $weekEnd = Carbon::now()->endOfWeek();

        $daysOfWeek = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $activities = Activity::selectRaw('SUM(steps) as total_steps, activity_date')
            ->where('created_by', Auth::user()->id)
            ->whereBetween('activity_date', [$weekStart, $weekEnd])
            ->groupBy('activity_date')
            ->get()
            ->keyBy(function ($item) {
                return Carbon::parse($item->activity_date)->format('l');
            });
        $activities = array_map(function ($day) use ($activities) {
            return isset($activities[$day]) ? $activities[$day]['total_steps'] : 0;
        }, $daysOfWeek);
        $string = json_encode($activities);
        $activities = htmlspecialchars($string);

        $totalSteps = Activity::where('created_by', Auth::user()->id)->whereDate('activity_date', Carbon::today())->sum('steps');
        $totalPoints = Activity::where('created_by', Auth::user()->id)->whereDate('activity_date', Carbon::today())->sum('points');
        $totalEnergy = Activity::where('created_by', Auth::user()->id)->whereDate('activity_date', Carbon::today())->sum('energy');

        return view('user.dashboard', compact('activities', 'totalSteps', 'totalPoints', 'totalEnergy'));
    }

    public function browse()
    {
        $user = Auth::user();
        return view('user.browse', compact('user'));
    }
}
