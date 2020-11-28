<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class StepAttachment extends Model
{
    protected $fillable = [ 'step_id', 'image' ];
    public static function boot() {
        parent::boot();
    
        static::creating(function($model) {
            $model->created_by = Auth::user()->id;
            $model->updated_by = Auth::user()->id;
        });
    }
}
