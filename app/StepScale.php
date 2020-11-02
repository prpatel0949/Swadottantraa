<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class StepScale extends Model
{
    protected $fillable = [ 'step_id', 'scale_id' ];

    public static function boot() {
        parent::boot();
    
        static::creating(function($model) {
            $model->created_by = Auth::user()->id;
            $model->updated_by = Auth::user()->id;
        });
    }

    public function scale()
    {
        return $this->belongsTo(Scale::class);
    }
}
