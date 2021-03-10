<?php

use Carbon\Carbon;
use App\SleepTracker;
use App\RecommandedProgram;
use App\ExerciseTrackerPoint;
use App\GratitudeQuestionAnswer;

if (!function_exists('recommanded_program')) {
    function recommanded_program($set_no)
    {
        $programs = RecommandedProgram::where('set_no', $set_no)->get();
        return $programs->pluck('program')->flatten()->implode('title', ' ,');
    }
}

if (!function_exists('checkProgram')) {
    function checkProgram()
    {
        $today = Carbon::now();
        $date = Carbon::parse(Auth::user()->last_checked_at);
        return $date->diffInDays($today);
    }
}

if (!function_exists('getCurrentYear')) {
    function getCurrentYear() {
        $month = '3-4';
        $months = Str::of($month)->split('/[\s-]+/');
        
        if (date('m') <= $months[0]) {
            $year = date('Y');
        } else {
            $year = date('Y') + 1;
        }
        
        $end_date = new DateTime($year . '-' . $months[1] . '-01');
        $start_date = clone $end_date;
        $start_date->modify('-1 year');
        $end_date->modify('-1 day');
        $date_range_arr = array('start_date' => $start_date->format('Y-m-d'), 
                                    'end_date' => $end_date->format('Y-m-d'));

        return $date_range_arr;
    }
}

if (!function_exists('sleep_tracker_anaysis')) {
    function sleep_tracker_anaysis()
    {
        $start = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $end = Carbon::now()->endOfWeek(Carbon::SUNDAY);

        $sleeps = SleepTracker::where('from', '>=', $start)->where('to', '<=', $end)->where('client_id', \Auth::user()->id)->get();
        $depth = $sleeps->sum('depth');
        return sprintf("%02d", intdiv($depth, 60)).' Hours '. sprintf("%02d", (abs($depth) % 60)). ' Minutes';
    }
}

if (!function_exists('exercise_tracker_anaysis')) {
    function exercise_tracker_anaysis()
    {
        $start = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $end = Carbon::now()->endOfWeek(Carbon::SUNDAY);

        $sleeps = ExerciseTrackerPoint::where('date', '>=', $start)->where('date', '<=', $end)->where('client_id', \Auth::user()->id)->get();
        if ($sleeps->count() == 0) {
            return 0;
        }
        return ($sleeps->sum('points') / $sleeps->count());
    }
}

if (!function_exists('gratitude_tracker_anaysis')) {
    function gratitude_tracker_anaysis()
    {
        $start = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $end = Carbon::now()->endOfWeek(Carbon::SUNDAY);

        $sleeps = GratitudeQuestionAnswer::whereDate('created_at', '>=', $start)->whereDate('created_at', '<=', $end)->where('client_id', \Auth::user()->id)->groupBy('set_no')->get()->groupBy(function($item) {
            return Carbon::parse($item->created_at)->format('Y-m-d');
       })->flatten();
       if ($sleeps->count() == 0) {
            return 0;
        }
       return $sleeps->sum('score') / $sleeps->count();
    }
}