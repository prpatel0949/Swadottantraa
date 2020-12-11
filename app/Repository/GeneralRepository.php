<?php
namespace App\Repository;

use App\Tip;
use App\Image;
use App\Trauma;
use App\MenuLink;
use App\ApiScaleQuestion;
use App\Repository\Interfaces\GeneralRepositoryInterface;

class GeneralRepository implements GeneralRepositoryInterface
{
    private $tip, $trauma, $menu, $image, $question;

    public function __construct(Tip $tip, Trauma $trauma, MenuLink $menu, Image $image, ApiScaleQuestion $question)
    {
        $this->tip = $tip;
        $this->trauma = $trauma;
        $this->menu = $menu;
        $this->image = $image;
        $this->question = $question;
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
}