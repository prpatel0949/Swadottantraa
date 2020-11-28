<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class ProgramStageStep extends Model
{
    protected $fillable = [ 'program_stage_id', 'title', 'description', 'comment' ];
    public static function boot() {
        parent::boot();
    
        static::creating(function($model) {
            $model->created_by = Auth::user()->id;
            $model->updated_by = Auth::user()->id;
        });
    }

    public function scales()
    {
        return $this->hasMany('App\StepScale', 'step_id');
    }

    public function workouts()
    {
        return $this->hasMany('App\StepWorkout', 'step_id');
    }

    public function attachments()
    {
        return $this->hasMany('App\StepAttachment', 'step_id');
    }

    public function sequences()
    {
        return $this->hasMany(ScaleWorkoutSequence::class, 'step_id');
    }
}
