<?php

namespace App;

use Auth;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $appends = [ 'is_subcribe' ];

    public static function boot() {
        parent::boot();
    
        static::creating(function($model) {
            $model->created_by = Auth::user()->id;
            $model->updated_by = Auth::user()->id;
        });
    }
    
    public function userPrograms()
    {
        return $this->hasMany('App\UserProgram');
    }

    public function questions()
    {
        return $this->hasMany('App\Question', 'prog_id');
    }

    public function getIsSubcribeAttribute()
    {
        if (Auth::check()) {
            $today = Carbon::parse(now())->format('Y-m-d');
            $cnt = $this->userPrograms->where('user_id', Auth::user()->id)->where('end_date', '>=', $today)->count();
            if ($cnt > 0) {
                return $this->attributes['is_subcribe'] = true;
            }

            return $this->attributes['is_subcribe'] = false;
        }
    }

    public function stages()
    {
        return $this->hasMany('App\ProgramStage');
    }
}
