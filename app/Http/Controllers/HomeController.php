<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use App\ContactUs;
use App\SelfiProgram;
use App\SelfiInterpretation;
use Illuminate\Http\Request;
use App\Repository\Interfaces\FAQRepositoryInterface;
use App\Repository\Interfaces\GeneralRepositoryInterface;

class HomeController extends Controller
{

    private $faq;
    public function __construct(FAQRepositoryInterface $faq, GeneralRepositoryInterface $general)
    {
        $this->faq = $faq;
        $this->general = $general;
    }
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
        return view('product/offline', [ 'states' => $this->general->getState() ]);
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
        $request->session()->put('question_tags', $request->tag);

        return response()->json([ 'tag store successfully.' ], 200);
    }

    public function faqs($type = '')
    {
        return view('faq', [ 'faqs' => $this->faq->getAll($type) ]);
    }

    public function contactUs(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:150',
            'number' => 'required|numeric|digits:10',
            'type' => 'required|integer',
            'message' => 'required|string'
        ]);

        $contact = new ContactUs;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->type = $request->type;
        $contact->mobile = $request->code.' '.$request->number;
        $contact->message = $request->message;
        $contact->save();

        return true;
    }

    public function franchiseeSearch(Request $request)
    {
        $franchisees = User::where([ 'type' => 2, 'state_id' => $request->state_id, 'city_id' => $request->city_id ])->get();
        return view('francisee', [ 'franchisees' => $franchisees ])->render();
    }

    public function selfieProgram()
    {
        return view('selfie_program', [ 'questions' => SelfiProgram::all() ]);
    }

    public function selfieResult(Request $request)
    {
        $total = 0;
        for ($i = 1; $i <= 9; $i++) {
            if (isset($request->{'question'.$i})) {
                $total += $request->{'question'.$i};
            }
        }
        $inter = SelfiInterpretation::where('min', '<=', $total)->where('max', '>=', $total)->first();
        return view('result', [ 'inter' => $inter ]);
    }
}
