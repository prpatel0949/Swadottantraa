<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Scale extends Model
{
    public static function boot() {
        parent::boot();
    
        static::creating(function($model) {
            $model->created_by = Auth::user()->id;
            $model->updated_by = Auth::user()->id;
        });
    }

    public function questions()
    {
        return $this->hasMany(ScaleQuestion::class);
    }

    public function programs()
    {
        return $this->hasMany('App\StepScale');
    }
}
