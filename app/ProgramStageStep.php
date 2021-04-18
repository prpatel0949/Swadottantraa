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

    /**
     * Get all of the answers for the ProgramStageStep
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function answers()
    {
        return $this->hasMany(ProgramAnswer::class, 'step_id');
    }

    public function getProcessAttribute()
    {
        $usedScales = 0;
        $totalScales = 0;
        $usedworkouts = 0;
        $totalworkouts = 0;
        $answers = $this->answers->where('user_id', Auth::user()->id)->where('is_draft', 0);
        foreach ($this->scales as $scale) {
            $scales_answers = $scale->scale->questions->pluck('id');
            $tscale = 0;
            $uscale = 0;
            foreach ($scales_answers as $question) {
                $uscale += ($answers->where('scale_question_id', $question)->count() > 0 ? 1 : 0);
                $tscale += 1;
            }
            
            $totalScales += 1;
            $usedScales += ($uscale >= $tscale ? 1 : 0);
            // $scales = $scale->scale->questions->pluck('id');
            // $totalScales += 1;
            // $scale_answers = $answers->whereIn('scale_question_id', $scales)->count();
            // if ($scales->count() <= $scale_answers) {
            //     $usedScales += 1;
            // }
        }

        foreach ($this->workouts as $workout) {
            $workouts_answers = $workout->workout->questions->pluck('id');
            $tworkout = 0;
            $uworkout = 0;
            foreach ($workouts_answers as $question) {
                $uworkout += ($answers->where('workout_question_id', $question)->count() > 0 ? 1 : 0);
                $tworkout += 1;
            }
            $totalworkouts += 1;
            $usedworkouts += ($uworkout >= $tworkout ? 1 : 0);
            // $workouts = $workout->workout->questions->pluck('id');
            // $totalworkouts += 1;
            // $workout_answers = $answers->whereIn('workout_question_id', $workouts)->count();
            // if ($workouts->count() == $workout_answers) {
            //     $usedworkouts += 1;
            // }
        }

        $total = $totalworkouts + $totalScales;
        $used = $usedworkouts + $usedScales;

        if ($total == 0) {
            return 0;
        }

        $per = ($used / $total) * 100;
        if ($per == 0) {
            $per = 20;
        }
        return number_format($per, 2, '.', '');

    }
}
