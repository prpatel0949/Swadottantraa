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
            return response()->json([ 'messsage' => 'Answer submit successfully.' ], 200);
        }

        return response()->json([ 'messsage' => 'Something went wrong happen!' ], 500);
    }
}
