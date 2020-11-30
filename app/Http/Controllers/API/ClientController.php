<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Client\AddRequest;
use App\Repository\Interfaces\ClientRepositoryInterface;

class ClientController extends Controller
{
    private $client;

    public function __construct(ClientRepositoryInterface $client)
    {
        $this->client = $client;
    }

    public function register(AddRequest $request)
    {
        if ($this->client->store($request->validated())) {
            return response()->json([ 'message' => 'User register successfully.' ], 200);
        }

        return response()->json([ 'message' => 'Something went wrong happen try again!' ], 500);
    }
}
