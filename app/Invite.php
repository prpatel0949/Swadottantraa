<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{
    protected $fillable = [
        'email', 'token',
    ];

    public static function boot() {
        parent::boot();
    
        static::creating(function($model) {
            $model->created_by = Auth::user()->id;
        });
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
