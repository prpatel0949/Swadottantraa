<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScaleWorkoutSequence extends Model
{
    public function typable()
    {
        return $this->morphTo();
    }
}
