<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function aboutUs()
    {
        return view('about');
    }

    public function happiness()
    {
        return view('happiness');
    }

    public function question()
    {
        return view('question');
    }

    public function nextQuestion(Request $request)
    {
        Session::put('question_'.$request->current_question, $request->answer);
        if ($request->current_question == 3) {
            return;
        }
        return view('next_question', [ 'current_question' => $request->current_question, 'answer' => $request->answer ])->render();
    }
}
