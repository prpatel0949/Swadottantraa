<?php
namespace App\Repository;

use Auth;
use Mail;
use Hash;
use App\Client;
use Carbon\Carbon;
use App\Repository\Interfaces\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    private $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
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
}