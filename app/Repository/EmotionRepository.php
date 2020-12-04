<?php
namespace App\Repository;

use App\Emotion;
use App\EmotionalInjury;
use App\EmotionalPainIntensity;
use App\Repository\Interfaces\EmotionRepositoryInterface;

class EmotionRepository implements EmotionRepositoryInterface
{
    private $emotion, $emotion_pain, $emotion_injury;

    public function __construct(Emotion $emotion, EmotionalPainIntensity $emotion_pain, EmotionalInjury $emotion_injury)
    {
        $this->emotion = $emotion;
        $this->emotion_pain = $emotion_pain;
        $this->emotion_injury = $emotion_injury;
    }

    public function all()
    {
        return $this->emotion->with('subEmotions')->get();
    }

    public function getEmotionPainIntensity()
    {
        return $this->emotion_pain->all();
    }

    public function getEmotionInjuries()
    {
        return $this->emotion_injury->all();
    }
}