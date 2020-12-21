<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiScaleQuestion extends Model
{
    public function answers()
    {
        return $this->hasMany(ApiScaleQuestionAnswer::class, 'question_id');
    }
}
