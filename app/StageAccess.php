<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StageAccess extends Model
{
    protected $fillable = [ 'program_id', 'stage_id', 'user_id' ];
}
