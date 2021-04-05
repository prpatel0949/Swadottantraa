<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmotionalInjury extends Model
{
    protected $hidden = [ 'created_at', 'updated_at' ];

    /**
     * Get all of the comments for the EmotionalInjury
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usersEnjuries()
    {
        return $this->hasMany(UserEmotionalInjury::class, 'emotional_injury_id', 'id');
    }
}
