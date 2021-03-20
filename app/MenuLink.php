<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuLink extends Model
{
    protected $appends = [ 'link_url', 'mlink_url' ];

    public function getLinkUrlAttribute()
    {
        return asset('images/menu/'.$this->link);
    }

    public function getMlinkUrlAttribute()
    {
        return asset('images/menu/'.$this->mlink);
    }
}
