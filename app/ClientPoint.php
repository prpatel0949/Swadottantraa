<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientPoint extends Model
{

    protected $appends = [ 'display_date' ];
    /**
     * Get the client that owns the ClientPoint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function getDisplayDateAttribute()
    {
        return \Carbon\Carbon::parse($this->created_at)->format('Y-m-d');
    }
}
