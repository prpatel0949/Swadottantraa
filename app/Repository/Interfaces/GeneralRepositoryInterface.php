<?php
namespace App\Repository\Interfaces;

interface GeneralRepositoryInterface
{
    public function getTips();

    public function getTraumas();

    public function getMenuLinks($request);

    public function getImages();

    public function getQuestions();

    public function storeAnswer($data);

    public function getSubsciptions();

    public function storeMoodMarks($data);

    public function getTraumaCopyingCart($request);

    public function storeSleepTracker($data);

    public function storeGratitudeAnswer($data);

    public function getInstitueList();

    public function storeExerciseTracker($data);

    public function getState();

    public function getMoodMarks($data);

    public function storeUserMenu($data);
}