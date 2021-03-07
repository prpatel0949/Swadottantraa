<?php

namespace App\Http\Controllers\Institue;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Interfaces\ClientRepositoryInterface;

class DashboardController extends Controller
{

    private $client;
    public function __construct(ClientRepositoryInterface $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        return view('institue.dashboard', [ 
            'ranks' => $this->client->getLeaderboard(),
            'mood_trackers' => $this->client->getMoodTracker(),
        ]);
    }
}
