<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScaleInterpreatation extends Model
{
    public function questions()
    {
        return $this->hasMany(ScaleInterpreatationQuestion::class);
    }

    public function interpretations()
    {
        return $this->hasMany(ScaleInterpreatationValue::class);
    }
}
