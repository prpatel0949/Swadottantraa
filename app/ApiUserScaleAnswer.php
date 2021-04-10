<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApiUserScaleAnswer extends Model
{
    /**
     * Get the user that owns the ApiUserScaleAnswer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function answer()
    {
        return $this->belongsTo(ApiScaleQuestionAnswer::class, 'answer_id');
    }
}
