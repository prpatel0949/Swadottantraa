<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TraumaCopingCart extends Model
{
    protected $appends = [ 'image_url' ];

    public function getImageUrlAttribute()
    {
        return asset('images/truma/'.$this->image);
    }
}
