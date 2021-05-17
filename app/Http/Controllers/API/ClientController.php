<?php

namespace App\Http\Controllers\API;

use Mail;
use Hash;
use Auth;
use Validator;
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

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:150|unique:clients,email',
            'mobile' => 'required|numeric|digits:10',
            'password' => 'required|string|min:8',
            'birth_date' => 'required|date_format:Y-m-d'
        ]);

        if ($validator->fails()) {
            $valid = $validator->errors()->toArray();
            if (isset($valid['email']) && $valid['email'][0] == 'The email has already been taken.') {
                $error = array_merge($validator->errors()->toArray(), [ 'user_duplicate' => true ]);
                return response()->json([ 'tbl' => [ $error  ] ], 200);
                // return response()->json([ 'errors' => $validator->errors(), 'user_duplicate' => true ], 200);
            } else {
                $error = array_merge($validator->errors()->toArray(), [ 'user_duplicate' => false ]);
                return response()->json([ 'tbl' => [ $error  ] ], 200);
                // return response()->json([ 'errors' => $validator->errors(), 'user_duplicate' => false ], 200);
            }
        }

        if ($client = $this->client->store($validator->valid())) {

            // Mail::send('emails.new_user', [ 'client' => $client, 'password' => $request->password ], function ($message) use ($client) {
            //     $message->to($client->email, $client->name);
            //     $message->subject('Welcome to Swa Heal');
            //     // $message->setBody('<p>Thank you for registration. You can use same creditionals for SWA Tantraa login.<a href="'. url('login') .'?type='. Hash::make(0) .'">Click here</a> to login.</p>', 'text/html');
            // });

            return response()->json([ 'tbl' => [[ 'Msg' => 'User register successfully.', 'user_duplicate' => false ] ] ], 200);
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
            'code.exists' => 'This Code is incorrect.'
        ]);

        if (Auth::user()->is_approve == 1) {
            return response()->json([ 'tbl' => [[ 'Msg' => 'You are connected to the '. Auth::user()->institue->name ] ] ], 422);
        }

        if ($this->client->applyCode($request->all())) {
            return response()->json([ 'tbl' => [[ 'Msg' => 'Your request has been sent! waiting for your institue to approve.' ] ] ], 200);
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
            $user = collect($this->client->all([ 'email' => $request->username ])->first()->toArray());
            $token = collect($token);
            $all = $user->merge($token);
    
            $result['EmotionalInjury'] = $this->emotion->getEmotionInjuries($user['id']);
            
            $result['Questions'] = $questions;
            $result['Answers'] = $questions->pluck('answers');
            $result['userAnswer'] = $this->general->getUserLastQuestions($user['id']);
            $result['ViewAllMenuStatus'] = $this->general->getMenuLinks();
            $result['institue'][] = ($user['is_approve'] == 1 ? $user['institue'] : null);
            $result['UserInfo'][] = $all->toArray();
            $result['UserEmotionalInfo'] = $this->client->getUserEmotionalInfo();
            return response()->json($result, 200);
        }

        return $response;
    }

    public function setTransaction()
    {
        if ($client = $this->client->setTransaction()) {
            return response()->json([ 'tbl' => [[ 'Msg' => 'Success! Payment done successfully.', 'transaction_id' => $client->id ] ] ], 200);
        }

        return response()->json([ 'tbl' => [[ 'Msg' => 'Something went wrong happen!.' ] ] ], 500);
    }

    public function getTransaction()
    {
        return response()->json([ 'tbl' => $this->client->getTransaction() ], 200);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'mobile' => 'required|numeric|digits:10',
            'birth_date' => 'required|date_format:Y-m-d',
            'email' => 'required|email|unique:clients,email,'.Auth::user()->id,
            'education' => 'nullable|string|max:150',
            'occupation' => 'nullable|string|max:150',
        ]);

        if ($client = $this->client->updateProfile($request->all())) {
            return response()->json([ 'tbl' => [[ 'Msg' => 'Success! profile update successfully.' ] ], 'data' => $client ], 200);
        }

        return response()->json([ 'tbl' => [[ 'Msg' => 'Something went wrong happen!.' ] ] ], 500);
    }

    public function setUserInfo(Request $request)
    {
        $request->validate([
            'sub_emotion_id' => 'required|exists:sub_emotions,id',
            'flag' => 'required|in:I,S,T'
        ]);

        if ($client = $this->client->setUserInfo($request->all())) {
            return response()->json([ 'tbl' => [[ 'Msg' => 'Success! user info added successfully.' ] ] ], 200);
        }

        return response()->json([ 'tbl' => [[ 'Msg' => 'Something went wrong happen!.' ] ] ], 500);
    }

    public function getUserInfo()
    {
        $result = [];
        $questions = $this->general->getQuestions();
        $result['EmotionalInjury'] = $this->emotion->getEmotionInjuries(1);
        $result['Questions'] = $questions;
        $result['Answers'] = $questions->pluck('answers');
        $result['ViewAllMenuStatus'] = $this->general->getMenuLinks();
        $result['institue'] = (auth()->user()->is_approve == 1 ? auth()->user()->institue : null);
        $result['UserInfo'][] = auth()->user()->toArray();
        $result['UserEmotionalInfo'] = $this->client->getUserEmotionalInfo();
        return response()->json($result, 200);
    }

    public function payment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric',
            'subscription_id' => 'required|exists:subscriptions,id',
            'coupon_code' => 'nullable|exists:codes,code'
        ]);

        if ($client = $this->client->payment($request->all())) {
            return response()->json([ 'tbl' => [[ 'Msg' => 'Success! package subscribe successfully.' ] ] ], 200);
        }

        return response()->json([ 'tbl' => [[ 'Msg' => 'Something went wrong happen!.' ] ] ], 500);
    }

    public function updateEmrgncyContactAndPayment(Request $request)
    {
        $request->validate([
            'emrgncy_contact' => 'nullable|string|max:20',
            // 'is_payment_done' => 'required|in:0,1',
            // 'user_transaction_id' => 'required|integer'
        ]);

        if ($client = $this->client->updateEmrgncyContactAndPayment($request->all())) {
            return response()->json([ 'tbl' => [[ 'Msg' => 'Success! Contact updated successfully.' ] ] ], 200);
        }

        return response()->json([ 'tbl' => [[ 'Msg' => 'Something went wrong happen!.' ] ] ], 500);
    }
}
