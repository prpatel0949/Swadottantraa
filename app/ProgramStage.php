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

    public function getProcessAttribute()
    {
        $used = $this->steps->sum('process');
        $total = $this->steps->count() * 100;

        if ($total == 0) {
            return 0;
        }

        $per = ($used / $total) * 100;
        if ($per >= 80) {
            $per = 100;
        } else {
            $per = $per + 20;
        }
        return $per = number_format($per, 2, '.', '');
    }
}
