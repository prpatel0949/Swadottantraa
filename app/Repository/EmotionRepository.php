<?php
namespace App\Repository;

use App\Emotion;
use App\Repository\Interfaces\EmotionRepositoryInterface;

class EmotionRepository implements EmotionRepositoryInterface
{
    private $emotion;

    public function __construct(Emotion $emotion)
    {
        $this->emotion = $emotion;
    }

    public function all()
    {
        return $this->emotion->with('subEmotions')->get();
    }
}