<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\Client\AddRequest;
use App\Repository\Interfaces\ClientRepositoryInterface;
use App\Repository\Interfaces\EmotionRepositoryInterface;
use App\Repository\Interfaces\GeneralRepositoryInterface;

class ClientController extends Controller
{
    private $client, $emotion, $general;

    public function __construct(ClientRepositoryInterface $client, EmotionRepositoryInterface $emotion, GeneralRepositoryInterface $general)
    {
        $this->client = $client;
        $this->emotion = $emotion;
        $this->general = $general;
    }

    public function register(AddRequest $request)
    {
        if ($this->client->store($request->validated())) {
            return response()->json([ 'tbl' => [[ 'Msg' => 'User register successfully.' ] ] ], 200);
        }

        return response()->json([ 'tbl' => [[ 'Msg' => 'Something went wrong happen!.' ] ] ], 500);
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:clients,email',
        ]);

        if ($client = $this->client->forgotPassword($request->all())) {
            return response()->json([ 'tbl' => [[ 'Msg' => 'Forgot password code sent to email.', 'code' => $client->code ] ] ], 200);
        }

        return response()->json([ 'tbl' => [[ 'Msg' => 'Something went wrong happen!.' ] ] ], 500);
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
            return response()->json([ 'tbl' => [[ 'Msg' => 'Password reset successfully.' ]] ], 200);
        } else if ($response == 2) {
            return response()->json([ 'tbl' => [[ 'Msg' => 'Code is invalid.' ]] ], 200);
        } else if ($response == 3) {
            return response()->json([ 'tbl' => [[ 'Msg' => 'Code is expired.' ]] ], 200);
        }

        return response()->json([ 'tbl' => [[ 'Msg' => 'Something went wrong happen!.' ] ] ], 500);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|string|min:8'
        ]);

        if ($client = $this->client->changePassword($request->all())) {
            return response()->json([ 'tbl' => [[ 'Msg' => 'Success! Your Password has been changed!' ] ] ], 200);
        }

        return response()->json([ 'tbl' => [[ 'Msg' => 'Old password is invalid.' ]] ], 500);
    }

    public function applyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|exists:users,code'
        ], [
            'code.exists' => 'Code is invalid'
        ]);

        if ($this->client->applyCode($request->all())) {
            return response()->json( [ 'Msg' => 'Your request has been sent! waiting for your institue to approve.' ], 200);
        }
    }

    public function generateToken(Request $request)
    {

        $proxy = Request::create('oauth/token', 'POST', $request->toArray());
        $response = \Route::dispatch($proxy);
        $token = (Array) json_decode($response->getContent());
        $result = [];
        if (isset($token['token_type']) && !empty($token['token_type'])) {

            $questions = $this->general->getQuestions();
            $user = collect($this->client->with('transaction')->all([ 'email' => $request->username ])->first()->toArray());
            $token = collect($token);
            $all = $user->merge($token);

            $result['EmotionalInjury'] = $this->emotion->getEmotionInjuries();
            $result['Questions'] = $questions;
            $result['Answers'] = $questions->pluck('answers');
            $result['ViewAllMenuStatus'] = $this->general->getMenuLinks();
            $result['UserInfo'][] = $all->toArray();
            return response()->json($result, 200);
        }

        return $response;
    }

    public function setTransaction()
    {
        if ($client = $this->client->setTransaction()) {
            return response()->json([ 'tbl' => [[ 'Msg' => 'Success! Payment done successfully.' ] ] ], 200);
        }

        return response()->json([ 'tbl' => [[ 'Msg' => 'Something went wrong happen!.' ] ] ], 500);
    }

    public function getTransaction()
    {
        return response()->json([ 'tbl' => $this->client->getTransaction() ], 200);
    }
}
