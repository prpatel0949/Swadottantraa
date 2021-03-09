<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScaleWorkoutSequence extends Model
{
    protected $fillable = [ 'typable_type', 'typable_id', 'step_id', 'sequence' ];

    public function typable()
    {
        return $this->morphTo();
    }

    public function step()
    {
    return $this->belongsTo('App\ProgramStageStep', 'step_id');
    }
}
