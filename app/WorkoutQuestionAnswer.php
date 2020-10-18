<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class WorkoutQuestionAnswer extends Model
{
    public static function boot() {
        parent::boot();
    
        static::creating(function($model) {
            $model->created_by = Auth::user()->id;
            $model->updated_by = Auth::user()->id;
        });
    }
}
