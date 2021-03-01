<?php
namespace App\Repository;

use Auth;
use App\Tip;
use App\Image;
use App\Trauma;
use App\MenuLink;
use App\ScaleTip;
use Carbon\Carbon;
use App\ClientPoint;
use App\SleepTracker;
use App\Subscription;
use App\ClientMoodMark;
use App\ApiScaleQuestion;
use App\TraumaCopingCart;
use App\ApiUserScaleAnswer;
use App\ApiScaleQuestionAnswer;
use App\Repository\Interfaces\GeneralRepositoryInterface;

class GeneralRepository implements GeneralRepositoryInterface
{
    private $tip, $trauma, $menu, $image, $question, $answer, $subscription,
            $mood_mark, $trauma_copying, $scale_question_answer, $scale_tips, $sleep_tracker, $points;

    public function __construct(
        Tip $tip,
        Trauma $trauma,
        MenuLink $menu,
        Image $image,
        ApiScaleQuestion $question,
        ApiUserScaleAnswer $answer,
        Subscription $subscription,
        ClientMoodMark $mood_mark,
        TraumaCopingCart $trauma_copying,
        ApiScaleQuestionAnswer $scale_question_answer,
        ScaleTip $scale_tips,
        SleepTracker $sleep_tracker,
        ClientPoint $points
    )
    {
        $this->tip = $tip;
        $this->trauma = $trauma;
        $this->menu = $menu;
        $this->image = $image;
        $this->question = $question;
        $this->answer = $answer;
        $this->subscription = $subscription;
        $this->mood_mark = $mood_mark;  
        $this->trauma_copying = $trauma_copying;
        $this->scale_question_answer = $scale_question_answer;
        $this->scale_tips = $scale_tips;
        $this->sleep_tracker = $sleep_tracker;
        $this->points = $points;
    }

    public function getTips()
    {
        return $this->tip->all();
    }

    public function getTraumas()
    {
        return $this->trauma->all();
    }

    public function getMenuLinks()
    {
        return $this->menu->all();
    }

    public function getImages()
    {
        return $this->image->all();
    }

    public function getQuestions()
    {
        return $this->question->all();
    }

    public function storeAnswer($data)
    {
        $answer = new $this->answer;
        $answer->answer_id = $data['answer_id'];
        $answer->user_id = Auth::user()->id;
        $answer->save();

        $score = $this->scale_question_answer->find($data['answer_id']);
        $tips = $this->scale_tips->where('min_value', '<=', $score->score)->where('max_value', '>=', $score->score)->first();

        return [ 'tbl_score' => [ [ 'score' => $score->score ] ], 'details' => [  $tips ] ];
    }

    public function getSubsciptions()
    {
        return $this->subscription->all();
    }

    public function storeMoodMarks($data)
    {
        return $this->mood_mark->create($data);
    }

    public function getTraumaCopyingCart($request)
    {
        return $this->trauma_copying->where([ 'lflag' => $request->lflag, 'trauma_id' => $request->trauma_id ])->get();
    }

    public function storeSleepTracker($data)
    {
        $sleep_tracker = new $this->sleep_tracker;
        $sleep_tracker->client_id = Auth::user()->id;
        $sleep_tracker->date = Carbon::now()->format('Y-m-d');
        $sleep_tracker->from = $data['from'];
        $sleep_tracker->to = $data['to'];
        $sleep_tracker->depth = $data['depth'];
        $sleep_tracker->save();

        $points = new $this->points;
        $points->client_id = Auth::user()->id;
        $points->rankable_type = get_class($sleep_tracker);
        $points->rankable_id = $sleep_tracker->id;
        $points->points = 0.25;
        $points->save();

        return true;
    }
}