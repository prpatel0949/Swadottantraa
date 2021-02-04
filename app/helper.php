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