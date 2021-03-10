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
            'date' => 'required|date|date_format:Y-m-d'
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
        return response()->json([ 'tbl' => $this->general->getTraumaCopyingCart($request) ], 200);
    }

    public function storeSleepTracker(Request $request)
    {
        $request->validate([
            'from' => 'required|date_format:Y-m-d H:i:s',
            'to' => 'required|date_format:Y-m-d H:i:s',
            'type' => 'required|string|in:high,medium,low'
            // 'depth' => 'required'
        ]);

        $data = $this->general->storeSleepTracker($request->all());
        return response()->json([ 'tbl' => [[ 'Msg' => 'Sleep tracker submitted successfully.', 'depth' => $data ]] ], 200);

        return response()->json([ 'tbl' => [[ 'Msg' => 'Something went wrong happen!.' ] ] ], 500);
    }

    public function storeGratitudeAnswer(Request $request)
    {
        $request->validate([
            'question1' => 'required|string',
            'question2' => 'required|string',
            'question3' => 'required|string',
            'question4' => 'required|string',
            'answer1' => 'nullable|string',
            'answer2' => 'nullable|string',
            'answer3' => 'nullable|string',
            'answer4' => 'nullable|string',
        ]);

        $data = $this->general->storeGratitudeAnswer($request->all());
        return response()->json([ 'tbl' => [[ 'Msg' => 'Answer submitted successfully.', 'score' => $data ]] ], 200);

        return response()->json([ 'tbl' => [[ 'Msg' => 'Something went wrong happen!.' ] ] ], 500);
    }

    public function getInstitueList()
    {
        return response()->json([ 'tbl' => $this->general->getInstitueList() ], 200);
    }

    public function storeExerciseTracker(Request $request)
    {
        $request->validate([
            'start_time' => 'required|date_format:H:i:s',
            'end_time' => 'required|date_format:H:i:s',
            'exercise_type' => 'required|string|in:physical,technical',
            'date' => 'required|date|date:Y-m-d',
            // 'score' => 'required|numeric'
        ]);

        $data = $this->general->storeExerciseTracker($request->all());

        return response()->json([ 'tbl' => [[ 'Msg' => 'Exercise submitted successfully.' ], [ 'points' => $data ] ] ], 200);

        return response()->json([ 'tbl' => [[ 'Msg' => 'Something went wrong happen!.' ] ] ], 500);
    }

    public function getSleepTrackerAnalysis()
    {
        return response()->json([ 'tbl' => [ [ 'depth' => sleep_tracker_anaysis() ] ] ], 200);
    }

    public function getExerciseTrackerAnalysis()
    {
        return response()->json([ 'tbl' => [ [ 'points' => exercise_tracker_anaysis() ] ] ], 200);
    }

    public function getGratitudeTrackerAnalysis()
    {
        return response()->json([ 'tbl' => [ [ 'points' => gratitude_tracker_anaysis() ] ] ], 200);
    }
}

