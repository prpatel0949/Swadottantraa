<?php

namespace App\Http\Controllers\API;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Interfaces\GeneralRepositoryInterface;

class GeneralController extends Controller
{

    private $general;

    public function __construct(GeneralRepositoryInterface $general)
    {
        $this->general = $general;
    }

    public function getTips()
    {
        return response()->json([ 'tbl' => $this->general->getTips() ], 200);
    }

    public function getTraumas()
    {
        return response()->json([ 'tbl' => $this->general->getTraumas() ], 200);
    }

    public function getMenuLinks()
    {
        return response()->json([ 'tbl' => $this->general->getMenuLinks() ], 200);
    }

    public function getImages()
    {
        return response()->json([ 'tbl' => $this->general->getImages() ], 200);   
    }

    public function getScaleQuestionAnswers()
    {
        $questions = $this->general->getQuestions();
        return response()->json([ 'Table' => $questions, 'Table1' => $questions->pluck('answers')->flatten() ], 200);
    }

    public function storeScaleQuestionAnswers(Request $request)
    {
        $request->validate([
            'answer_id' => 'required|integer|exists:api_scale_question_answers,id'
        ]);

        if ($this->general->storeAnswer($request->all())) {
            return response()->json($this->general->storeAnswer($request->all()), 200);
        }

        return response()->json([ 'tbl' => [[ 'Msg' => 'Something went wrong happen!.' ] ] ], 500);
    }

    public function getSubsciptions()
    {
        return response()->json([ 'tbl' => $this->general->getSubsciptions() ], 200);
    }

    public function storeMoodMarks(Request $request)
    {
        $request->validate([
            'mood_id' => 'required|exists:moods,id',
            'lower_mood_id' => 'required|exists:moods,id',
            'marks' => 'required|numeric',
            'lower_marks' => 'required|numeric',
        ]);
        if ($this->general->storeMoodMarks($request->all())) {
            return response()->json([ 'tbl' => [[ 'Msg' => 'Mood marks submitted successfully.' ]] ], 200);
        }

        return response()->json([ 'tbl' => [[ 'Msg' => 'Something went wrong happen!.' ] ] ], 500);
    }

    public function submitAnswer(Request $request)
    {
        // $request->validate([
        //     'answer_id' => 'required|exists:api_scale_question_answers,'
        // ]);
    }

    public function getTraumaCopyingCart(Request $request)
    {
        return response()->json($this->general->getTraumaCopyingCart($request), 200);
    }

    public function storeSleepTracker(Request $request)
    {
        $request->validate([
            'from' => 'required|date_format:Y-m-d H:i:s',
            'to' => 'required|date_format:Y-m-d H:i:s',
            'depth' => 'required'
        ]);

        if ($this->general->storeSleepTracker($request->all())) {
            return response()->json([ 'tbl' => [[ 'Msg' => 'Sleep tracker submitted successfully.' ]] ], 200);
        }

        return response()->json([ 'tbl' => [[ 'Msg' => 'Something went wrong happen!.' ] ] ], 500);
    }

    public function storeGratitudeAnswer(Request $request)
    {
        $request->validate([
            'questions' => 'array|present',
            'questions.*' => 'required|string',
            'answers.*' => 'nullable|string',
            'score' => 'required|numeric'
        ]);

        if ($this->general->storeGratitudeAnswer($request->all())) {
            return response()->json([ 'tbl' => [[ 'Msg' => 'Answer submitted successfully.' ]] ], 200);
        }

        return response()->json([ 'tbl' => [[ 'Msg' => 'Something went wrong happen!.' ] ] ], 500);
    }

    public function getInstitueList()
    {
        return response()->json($this->general->getInstitueList(), 200);
    }
}

