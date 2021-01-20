<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = [ 'description', 'type' ];

    public static function boot() {
        parent::boot();
    
        static::creating(function($model) {
            $model->user_id = Auth::user()->id;
        });
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
