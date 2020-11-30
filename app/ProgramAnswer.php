<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class ProgramAnswer extends Model
{
    protected $fillable = [ 'is_resubmit' ];

    public static function boot() {
        parent::boot();
    
        static::creating(function($model) {
            $model->user_id = Auth::user()->id;
        });
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function program()
    {
        return $this->belongsTo('App\Program');
    }

    public function scaleQuestion()
    {
        return $this->belongsTo('App\ScaleQuestion', 'scale_question_id');
    }

    public function scaleQuestionAnswer()
    {
        return $this->belongsTo('App\ScaleQuestionAnswer');
    }

    public function workoutQuestion()
    {
        return $this->belongsTo('App\WorkoutQuestion', 'workout_question_id');
    }

    public function workoutQuestionAnswer()
    {
        return $this->belongsTo('App\WorkoutQuestionAnswer');
    }

    public function comments()
    {
        return $this->hasMany(AnswerComment::class);
    }
}
