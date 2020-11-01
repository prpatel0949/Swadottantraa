<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function userProgram()
    {
        return $this->belongsTo('App\UserProgram', 'user_program_id');
    }
}
