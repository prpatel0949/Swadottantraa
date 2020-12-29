<?php

namespace App\Http\Controllers\Institue;

use Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Interfaces\UserRepositoryInterface;
use App\Repository\Interfaces\ClientRepositoryInterface;

class UserController extends Controller
{
    private $user, $client;

    public function __construct(UserRepositoryInterface $user, ClientRepositoryInterface $client)
    {
        $this->user = $user;
        $this->client = $client;
    }

    public function index()
    {
        $clients = Auth::user()->clients->sortBy('is_approve');
        return view('institue.users', [ 'clients' => $clients ]);
    }

    public function approveUser(Request $requrest, $id)
    {
        if ($this->client->update([ 'is_approve' => 1 ], $id)) {
            return response()->json([ 'success' => 'success' ], 200);
        }

        return response()->json([ 'error' => 'error' ], 500);
    }

    public function approveReject(Request $request, $id)
    {
        if ($this->client->update([ 'is_approve' => 2 ], $id)) {
            return response()->json([ 'success' => 'success' ], 200);
        }

        return response()->json([ 'error' => 'error' ], 500);
    }
}
