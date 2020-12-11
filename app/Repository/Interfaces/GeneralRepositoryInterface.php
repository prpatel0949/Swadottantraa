<?php
namespace App\Repository\Interfaces;

interface GeneralRepositoryInterface
{
    public function getTips();

    public function getTraumas();

    public function getMenuLinks();

    public function getImages();

    public function getQuestions();
}