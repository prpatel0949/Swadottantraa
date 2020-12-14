<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Interfaces\EmotionRepositoryInterface;

class EmotionController extends Controller
{
    private $emotion;

    public function __construct(EmotionRepositoryInterface $emotion)
    {
        $this->emotion = $emotion;
    }

    public function index()
    {
        $emotions = $this->emotion->all();
        $allData = [];
        foreach ($emotions as $emotion) {
            $rowRes = new \StdClass;
            $rowRes->id = $emotion->id;
            $rowRes->emotions = $emotion->emotions;
            $rowRes->emotions_marathi = $emotion->emotions_marathi;
            $allData[] = $rowRes;
        }
        return response()->json([ 'emotions' => $allData, 'sub_emotions' => $emotions->pluck('subEmotions')->flatten() ], 200);
        // subEmotions
    }

    public function getEmotionPainIntensity()
    {
        return $this->emotion->getEmotionPainIntensity();
    }

    public function getEmotionInjuries()
    {
        return $this->emotion->getEmotionInjuries();
    }

    public function storeEmotionInjuries(Request $request)
    {
        $request->validate([
            'emotional_injury_id' => 'required|exists:emotional_injuries,id',
            'other' => 'nullable|string'
        ]);

        $this->emotion->storeEmotionInjuries($request->all());

        return response()->json([ 'message' => 'User emotionals injury created successfully.' ], 200);
    }
}
