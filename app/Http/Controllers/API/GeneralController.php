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
}
