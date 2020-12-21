<?php
namespace App\Repository;

use Auth;
use App\Tip;
use App\Image;
use App\Trauma;
use App\MenuLink;
use App\ApiScaleQuestion;
use App\ApiUserScaleAnswer;
use App\ApiScaleQuestionAnswer;
use App\Repository\Interfaces\GeneralRepositoryInterface;

class GeneralRepository implements GeneralRepositoryInterface
{
    private $tip, $trauma, $menu, $image, $question, $answer;

    public function __construct(Tip $tip, Trauma $trauma, MenuLink $menu, Image $image, ApiScaleQuestion $question, ApiUserScaleAnswer $answer)
    {
        $this->tip = $tip;
        $this->trauma = $trauma;
        $this->menu = $menu;
        $this->image = $image;
        $this->question = $question;
        $this->answer = $answer;
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
        return true;
    }
}