<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class StepWorkout extends Model
{
    protected $fillable = [ 'step_id', 'workout_id' ];

    public static function boot() {
        parent::boot();
    
        static::creating(function($model) {
            $model->created_by = Auth::user()->id;
            $model->updated_by = Auth::user()->id;
        });
    }

    public function workout()
    {
        return $this->belongsTo(Workout::class);
    }

    public function sequences()
    {
        return $this->morphMany('App\ScaleWorkoutSequence', 'typable');
    }
}
