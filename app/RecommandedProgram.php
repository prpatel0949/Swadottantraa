<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecommandedProgram extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
