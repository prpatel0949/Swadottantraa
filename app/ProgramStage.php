<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class ProgramStage extends Model
{
    protected $fillable = [ 'program_id', 'title', 'description', 'order' ];

    public static function boot() {
        parent::boot();
    
        static::creating(function($model) {
            $model->created_by = Auth::user()->id;
            $model->updated_by = Auth::user()->id;
        });
    }

    public function steps()
    {
        return $this->hasMany('App\ProgramStageStep');
    }
}
