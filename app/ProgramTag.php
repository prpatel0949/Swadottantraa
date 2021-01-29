<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramTag extends Model
{
    protected $fillable = [ 'program_id', 'tag' ];
}
