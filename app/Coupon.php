<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [ 'title', 'code', 'start_date', 'end_date', 'discount' ];

    protected $appends = [ 'is_valid' ];

    public function getIsValidAttribute()
    {
        $start = Carbon::parse($this->start_date)->format('Y-m-d');
        $end = Carbon::parse($this->end_date)->format('Y-m-d');
        $today = Carbon::now()->format('Y-m-d');

        if ($start <= $today && $end >= $today) {
            return $this->attributes['is_valid'] = true;
        }

        return $this->attributes['is_valid'] = false;
    }
}
