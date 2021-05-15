<?php
namespace App\Repository;

use Auth;
use App\Client;
use App\Emotion;
use App\EmotionalInjury;
use App\UserEmotionalInjury;
use App\EmotionalPainIntensity;
use App\Repository\Interfaces\EmotionRepositoryInterface;

class EmotionRepository implements EmotionRepositoryInterface
{
    private $emotion, $emotion_pain, $emotion_injury, $user_emotion_injury, $client;

    public function __construct(Emotion $emotion, EmotionalPainIntensity $emotion_pain, EmotionalInjury $emotion_injury, UserEmotionalInjury $user_emotion_injury, Client $client)
    {
        $this->emotion = $emotion;
        $this->emotion_pain = $emotion_pain;
        $this->emotion_injury = $emotion_injury;
        $this->user_emotion_injury = $user_emotion_injury;
        $this->client = $client;
    }

    public function all()
    {
        return $this->emotion->get();
    }

    public function getEmotionPainIntensity()
    {
        return $this->emotion_pain->all();
    }

    public function getEmotionInjuries($user_id = 0)
    {
        if ($user_id > 0) {

            $emg = $this->user_emotion_injury->where('user_id', $user_id)->orderBy('id', 'DESC')->first();

            return $this->emotion_injury->where('id', (!empty($emg) ? $emg->emotional_injury_id : ''))->get();
        }
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

        $client = $this->client->find(Auth::user()->id);
        $client->is_used = 1;
        $client->save();

        return true;

    }
}