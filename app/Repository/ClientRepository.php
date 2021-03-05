<?php
namespace App\Repository;

use Auth;
use Hash;
use Mail;
use Session;
use App\User;
use App\Client;
use Carbon\Carbon;
use App\ClientTransaction;
use App\Repository\Interfaces\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    private $client, $user, $transaction;

    public function __construct(Client $client, User $user, ClientTransaction $transaction)
    {
        $this->client = $client;
        $this->user = $user;
        $this->transaction = $transaction;
    }

    public function store($data)
    {
        $data['password'] = Hash::make($data['password']);
        return $this->client->insert($data);
    }

    public function forgotPassword($data)
    {
        $client = $this->client->where('email', $data['email'])->first();
        $code = rand(1111, 9999);
        // Mail::send([], [], function ($message) use ($client, $code) {
        //     $message->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        //     $message->to($client->email, $client->name);
        //     $message->subject('Forgot Password');
        //     $message->setBody('Your Forgot Password Code is :'. $code);
        // });

        $client->code = $code;
        $client->send_time = now();
        $client->save();

        return $client;
    }

    public function resetPassword($data)
    {
        $client = $this->client->where(['email' => $data['email'], 'code' => $data['code']])->first();
        if (empty($client)) {
            return 2;
        }

        $send_date = new Carbon($client->send_time);
        $current_date = new Carbon(now());

        $time = $send_date->diffInMinutes($current_date);

        if ($time <= 15) {
            $client->password = Hash::make($data['password']);
            $client->code = null;
            $client->send_time = null;
            $client->save();

            return 1;
        } else {
            return 3;
        }
    }

    public function changePassword($data)
    {
        $client = $this->client->find(Auth::user()->id);
        if (Hash::check($data['old_password'], $client->password)) {
            $client->password = Hash::make($data['new_password']);
            $client->save();

            return true;
        } else {
            return false;
        }
    }

    public function applyCode($data)
    {
        $user = $this->user->where('code', $data['code'])->first();

        $client = $this->client->find(Auth::user()->id);
        $client->user_id = $user->id;
        $client->save();
        return true;
    }

    public function update($data, $id)
    {
        return $this->client->find($id)->update($data);
    }

    public function approveUser($id)
    {
        $count = $this->client->where([ 'user_id' => Auth::user()->id, 'is_approve' => 1 ])->count();
        if (Auth::user()->number_of_users != 0 && Auth::user()->number_of_users >= $count) {
            return $this->client->find($id)->update([ 'is_approve' => 1 ]);
        }

        Session::flash('error', 'Number of users reached');
        return true;
    }

    public function all($filters = [])
    {
        if (count($filters) > 0) {
            return $this->client->with('transaction')->where($filters)->get();
        }

        return $this->client->all();
    }

    public function setTransaction()
    {
        $transaction = new $this->transaction;
        $transaction->client_id = Auth::user()->id;
        $transaction->save();

        $client = Auth::user();
        $client->is_payment_done = 1;
        $client->save();

        return true;
    }

    public function getTransaction()
    {
        $transactions = $this->transaction->where('client_id', Auth::user()->id)->get();
        $allData = [];
        foreach ($transactions as $transaction) {
            $rowRes = new \StdClass;
            $rowRes->id = $transaction->id;
            $rowRes->name = $transaction->client->name;
            $rowRes->created_at = $transaction->created_at;
            $allData[] = $rowRes;
        }

        return $allData;
    }
}