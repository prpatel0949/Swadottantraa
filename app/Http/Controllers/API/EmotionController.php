<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Interfaces\EmotionRepositoryInterface;

class EmotionController extends Controller
{
    private $emotion;

    public function __construct(EmotionRepositoryInterface $emotion)
    {
        $this->emotion = $emotion;
    }

    public function index()
    {
        return $this->emotion->all();
    }
}
