<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientPoint extends Model
{
    /**
     * Get the client that owns the ClientPoint
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
