<?php 
namespace App\Repository\Interfaces;

interface EmotionRepositoryInterface
{
    public function all();

    public function getEmotionPainIntensity();

    public function getEmotionInjuries();

    public function storeEmotionInjuries($data);
}