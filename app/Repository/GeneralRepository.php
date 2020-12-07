<?php
namespace App\Repository;

use App\Tip;
use App\Image;
use App\Trauma;
use App\MenuLink;
use App\Repository\Interfaces\GeneralRepositoryInterface;

class GeneralRepository implements GeneralRepositoryInterface
{
    private $tip, $trauma, $menu, $image;

    public function __construct(Tip $tip, Trauma $trauma, MenuLink $menu, Image $image)
    {
        $this->tip = $tip;
        $this->trauma = $trauma;
        $this->menu = $menu;
        $this->image = $image;
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
}