<?php

namespace App;

use Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country_code', 'prefix', 'franchisee_code', 'dob', 'mobile', 'type', 'education', 'profile', 'occupation', 'gender', 'address', 'code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $append = [
        'link'
    ];

    public function franchisee()
    {
        return $this->belongsTo(User::class, 'franchisee_id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'franchisee_id');
    }

    public function getLinkAttribute()
    {
        $link = '#';
        if (Auth::check()) {
            if (Auth::user()->type == 0) {
                $link = route('individual.program');
            }
    
            if (Auth::user()->type == 2) {
                $link = route('franchisee.dashboard');
            }
        }

        return $this->attributes['link'] = $link;
    }
}
