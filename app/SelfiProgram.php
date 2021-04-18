<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelfiProgram extends Model
{
    /**
     * Get all of the options for the SelfiProgram
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function options()
    {
        return $this->hasMany(SelfiProgramOption::class);
    }
}
