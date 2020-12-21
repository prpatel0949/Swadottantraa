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

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:clients,email',
        ]);

        if ($client = $this->client->forgotPassword($request->all())) {
            return response()->json([ 'message' => 'Forgot password code sent to email.', 'code' => $client->code ], 200);
        }

        return response()->json([ 'message' => 'Something went wrong happen try again!' ], 500);
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:clients,email',
            'code' => 'required',
            'password' => 'required|string|min:8'
        ]);

        $response = $this->client->resetPassword($request->all());

        if ($response == 1) {
            return response()->json([ 'message' => 'Password reset successfully.' ], 200);
        } else if ($response == 2) {
            return response()->json([ 'message' => 'Code is invalid.' ], 200);
        } else if ($response == 3) {
            return response()->json([ 'message' => 'Code is expired.' ], 200);
        }

        return response()->json([ 'message' => 'Something went wrong happen try again!' ], 500);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8'
        ]);

        if ($client = $this->client->changePassword($request->all())) {
            return response()->json([ 'message' => 'Password changed successfully.' ], 200);
        }

        return response()->json([ 'message' => 'Old password is invalid.' ], 500);
    }
}
