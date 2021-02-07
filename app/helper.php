<?php

use Carbon\Carbon;
use App\RecommandedProgram;

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