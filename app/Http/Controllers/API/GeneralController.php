<?php

namespace App\Http\Controllers\API;

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
        return $this->general->getTips();
    }

    public function getTraumas()
    {
        return $this->general->getTraumas();
    }

    public function getMenuLinks()
    {
        return $this->general->getMenuLinks();
    }

    public function getImages()
    {
        return $this->general->getImages();   
    }

    public function getScaleQuestionAnswers()
    {
        $questions = $this->general->getQuestions();
        return response()->json([ 'question' => $questions, 'answers' => $questions->pluck('answers') ], 200);
    }

    public function storeScaleQuestionAnswers(Request $request)
    {
        $request->validate([
            'answer_id' => 'required|integer|exists:api_scale_question_answers,id'
        ]);

        if ($this->general->storeAnswer($request->all())) {
            return response()->json([ 'messsage' => 'Answer submit successfully.' ], 200);
        }

        return response()->json([ 'messsage' => 'Something went wrong happen!' ], 500);
    }
}
