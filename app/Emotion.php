<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emotion extends Model
{

    protected $hidden = [ 'created_at', 'updated_at' ];

    public function subEmotions()
    {
        return $this->hasMany(SubEmotion::class, 'emotion_id');
    }
}
