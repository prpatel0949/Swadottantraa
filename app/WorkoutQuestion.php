<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class WorkoutQuestion extends Model
{
    public static function boot() {
        parent::boot();
    
        static::creating(function($model) {
            $model->created_by = Auth::user()->id;
            $model->updated_by = Auth::user()->id;
        });
    }

    public function answers()
    {
        return $this->hasMany(WorkoutQuestionAnswer::class);
    }
}
