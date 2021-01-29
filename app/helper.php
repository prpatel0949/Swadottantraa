<?php

use App\RecommandedProgram;

if (!function_exists('recommanded_program')) {
    function recommanded_program($set_no)
    {
        $programs = RecommandedProgram::where('set_no', $set_no)->get();
        return $programs->pluck('program')->flatten()->implode('title', ' ,');
    }
}