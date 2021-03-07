<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [ 'name', 'email', 'mobile', 'password', 'is_approve', 'birth_date' ];

    protected $appends = [ 'is_regular' ];

    /**
     * Get the transaction associated with the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function transaction(): HasOne
    {
        return $this->hasOne(ClientTransaction::class);
    }

    /**
     * Get all of the moods for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function moods()
    {
        return $this->hasMany(ClientMoodMark::class);
    }

    /**
     * Get all of the points for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function points()
    {
        return $this->hasMany(ClientPoint::class);
    }

    public function getIsRegularAttribute()
    {
        $date = \Carbon\Carbon::now()->subDays(14)->format('Y-m-d');
        $mood = $this->points->where('rankable_type', 'App\ClientMoodMark')->where('created_at', '>=', $date)->count();
        $sleep = $this->points->where('rankable_type', 'App\SleepTracker')->where('created_at', '>=', $date)->count();
        $excerise = $this->points->where('rankable_type', 'App\ExerciseTracker')->where('created_at', '>=', $date)->count();
        $grad = $this->points->where('rankable_type', 'App\GratitudeQuestionAnswer')->where('created_at', '>=', $date)->count();

        if ($mood > 0 && $sleep > 0 && $excerise > 0 && $grad > 0) {
            return true;
        }

        return false;
    }

}
