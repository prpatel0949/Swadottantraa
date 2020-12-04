<?php
namespace App\Repository;

use App\Tip;
use App\Trauma;
use App\MenuLink;
use App\Repository\Interfaces\GeneralRepositoryInterface;

class GeneralRepository implements GeneralRepositoryInterface
{
    private $tip, $trauma, $menu;

    public function __construct(Tip $tip, Trauma $trauma, MenuLink $menu)
    {
        $this->tip = $tip;
        $this->trauma = $trauma;
        $this->menu = $menu;
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
}