<?php

namespace App;

use App\ClientPoint;
use App\ClientMoodMark;
use Carbon\CarbonPeriod;
use App\ClientTransaction;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [ 'name', 'email', 'mobile', 'password', 'is_approve', 'birth_date' ];

    protected $appends = [ 'is_regular', 'client_institue', 'is_paid' ];

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
        $ldate = \Carbon\Carbon::now()->subDays(20)->format('Y-m-d');
        $today = \Carbon\Carbon::now()->format('Y-m-d');

        $period = CarbonPeriod::create($ldate, $today);
        $skip_days = 0;
        foreach ($period as $date) {
            $formated_date = $date->format('Y-m-d');
            $mood = $this->points->where('rankable_type', 'App\ClientMoodMark')->where('display_date', $formated_date)->count();
            if ($mood == 0) {
                $skip_days += 1;
                continue;
            }
            $sleep = $this->points->where('rankable_type', 'App\SleepTracker')->where('display_date', $formated_date)->count();
            if ($sleep == 0) {
                $skip_days += 1;
                continue;
            }
            $sleep = $this->points->where('rankable_type', 'App\ExerciseTracker')->where('display_date', $formated_date)->count();
            if ($sleep == 0) {
                $skip_days += 1;
                continue;
            }
            $sleep = $this->points->where('rankable_type', 'App\GratitudeQuestionAnswer')->where('display_date', $formated_date)->count();
            if ($sleep == 0) {
                $skip_days += 1;
                continue;
            }

        }
        if ($skip_days > 3) {
            return false;
        }

        return true;

        // $mood = $this->points->where('rankable_type', 'App\ClientMoodMark')->where('created_at', '>=', $date)->count();
        // $sleep = $this->points->where('rankable_type', 'App\SleepTracker')->where('created_at', '>=', $date)->count();
        // $excerise = $this->points->where('rankable_type', 'App\ExerciseTracker')->where('created_at', '>=', $date)->count();
        // $grad = $this->points->where('rankable_type', 'App\GratitudeQuestionAnswer')->where('created_at', '>=', $date)->count();

        // if ($mood > 0 && $sleep > 0 && $excerise > 0 && $grad > 0) {
        //     return true;
        // }

        // return false;
    }

    /**
     * Get the institue that owns the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function institue()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Get all of the payments for the Client
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function payments()
    {
        return $this->hasMany(ClientPayment::class);
    }

    public function getClientInstitueAttribute()
    {
        if ($this->is_approve == 1) {
            $data = [];
            $data[] = $this->institue->toArray();
            return $data;
        } else {
            return json_encode((object)[]);
        }
    }

    public function getIsPaidAttribute()
    {
        $today_date = \Carbon\Carbon::now()->format('Y-m-d');
        if ($this->payments->where('end_date', '>=', $today_date)->count() > 0) {
            return true;
        }

        return false;
    }

}
