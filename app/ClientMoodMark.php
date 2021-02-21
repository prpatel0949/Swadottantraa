<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class ClientMoodMark extends Model
{

    protected $fillable = [ 'mood_id', 'lower_mood_id', 'marks', 'lower_marks' ];

    public static function boot() {
        parent::boot();
    
        static::creating(function($model) {
            $model->client_id = Auth::user()->id;
        });
    }
}
