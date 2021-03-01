<?php
namespace App\Repository;

use Auth;
use App\Emotion;
use App\EmotionalInjury;
use App\UserEmotionalInjury;
use App\EmotionalPainIntensity;
use App\Repository\Interfaces\EmotionRepositoryInterface;

class EmotionRepository implements EmotionRepositoryInterface
{
    private $emotion, $emotion_pain, $emotion_injury, $user_emotion_injury;

    public function __construct(Emotion $emotion, EmotionalPainIntensity $emotion_pain, EmotionalInjury $emotion_injury, UserEmotionalInjury $user_emotion_injury)
    {
        $this->emotion = $emotion;
        $this->emotion_pain = $emotion_pain;
        $this->emotion_injury = $emotion_injury;
        $this->user_emotion_injury = $user_emotion_injury;
    }

    public function all()
    {
        return $this->emotion->get();
    }

    public function getEmotionPainIntensity()
    {
        return $this->emotion_pain->all();
    }

    public function getEmotionInjuries()
    {
        return $this->emotion_injury->all();
    }

    public function storeEmotionInjuries($data)
    {
        $inj = new $this->user_emotion_injury;
        $inj->user_id = Auth::user()->id;
        $inj->emotional_injury_id = $data['emotional_injury_id'];
        $inj->other = (isset($data['other']) ? $data['other'] : '');
        // $inj->client_transaction_id = $data['client_transaction_id'];
        $inj->save();

        return true;

    }
}