<?php
namespace App\Repository\Interfaces;

interface GeneralRepositoryInterface
{
    public function getTips();

    public function getTraumas();

    public function getMenuLinks();

    public function getImages();

    public function getQuestions();

    public function storeAnswer($data);

    public function getSubsciptions();

    public function storeMoodMarks($data);

    public function getTraumaCopyingCart($request);

    public function storeSleepTracker($data);

    public function storeGratitudeAnswer($data);
}