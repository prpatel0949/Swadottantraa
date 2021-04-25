<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientPayment extends Model
{
    /**
     * Get the user that owns the ClientPayment
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Client()
    {
        return $this->belongsTo(Client::class);
    }
}
