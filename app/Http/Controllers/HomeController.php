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

    public function BrainAndMindGym()
    {
        return view('product/bamg');
    }

    public function EMR()
    {
        return view('product/emr');
    }

    public function offline()
    {
        return view('product/offline');
    }

    public function privacyPolicy()
    {
        return view('privacy_policy');
    }

    public function termsAndConditions()
    {
        return view('terms_and_conditions');
    }

    public function psyheal()
    {
        return view('product/psyheal');
    }

    public function psytele()
    {
        return view('product/psytele');
    }

    public function selfie()
    {
        return view('product/selfie');
    }

    public function storeTags(Request $request)
    {
        $request->session()->put('question_tags', $request->tags);

        return response()->json([ 'tag store successfully.' ], 200);
    }
}
