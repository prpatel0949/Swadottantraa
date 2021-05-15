<?php
namespace App\Repository;

use DB;
use Auth;
use Hash;
use Mail;
use Session;
use App\Code;
use App\User;
use App\Client;
use App\UserInfo;
use Carbon\Carbon;
use App\Subscription;
use App\ClientPayment;
use App\ClientTransaction;
use App\Repository\Interfaces\ClientRepositoryInterface;

class ClientRepository implements ClientRepositoryInterface
{
    private $client, $user, $transaction, $user_info, $package, $payment, $code;

    public function __construct(Client $client, User $user, ClientTransaction $transaction, UserInfo $user_info, Subscription $package, ClientPayment $payment, Code $code)
    {
        $this->client = $client;
        $this->user = $user;
        $this->transaction = $transaction;
        $this->user_info = $user_info;
        $this->package = $package;
        $this->payment = $payment;
        $this->code = $code;
    }

    public function store($data)
    {
        $data['password'] = Hash::make($data['password']);
        $client = $this->client->create($data);
        
        $user = $this->user->where('email', $client->email)->first();
        if (empty($user)) {
            $user = new $this->user;
            $user->name = $client->name;
            $user->email = $client->email;
            $user->dob = $client->birth_date;
            $user->mobile = $client->mobile;
            $user->password = $client->password;
            $user->type = 0;
            $user->save();
        }

        return $client;
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
            return $this->client->with('institue')->where($filters)->get();
        }

        return $this->client->with('institue')->all();
    }

    public function setTransaction()
    {
        $transaction = new $this->transaction;
        $transaction->client_id = Auth::user()->id;
        $transaction->save();

        $client = Auth::user();
        $client->is_payment_done = 1;
        $client->save();

        return $transaction;
    }

    public function getTransaction()
    {
        $transactions = $this->payment->where('client_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $allData = [];
        foreach ($transactions as $transaction) {
            $rowRes = new \StdClass;
            $rowRes->id = $transaction->id;
            $rowRes->name = $transaction->client->name;
            $rowRes->amount = $transaction->amount;
            $rowRes->date = Carbon::parse($transaction->date)->format('d-m-Y');
            $rowRes->end_date = Carbon::parse($transaction->end_date)->format('d-m-Y');
            $rowRes->created_at = $transaction->created_at;
            $rowRes->subscription = $transaction->package->subscription;
            $allData[] = $rowRes;
        }

        return $allData;
    }

    public function getLeaderboard()
    {
        $month = Carbon::now()->month;
        $clients = $this->client->select('id')->where('user_id', Auth::user()->id)->get();
        return DB::table('client_points')
            ->select(DB::raw('SUM(client_points.points) as points, clients.name, clients.email, clients.mobile'))
            ->join('clients', 'clients.id', 'client_points.client_id')
            ->whereIn('client_points.client_id', $clients->pluck('id')->toArray())
            ->whereMonth('client_points.created_at', $month)->groupBy('client_id')->get()->take(10);
    }

    public function updateProfile($data)
    {
        $client = $this->client->find(Auth::user()->id);
        $client->name = $data['name'];
        $client->mobile = $data['mobile'];
        $client->birth_date = $data['birth_date'];
        $client->email = $data['email'];
        $client->education = $data['education'];
        $client->occupation = $data['occupation'];
        $client->save();

        return $client;
    }

    public function getMoodTracker()
    {
        $users = Auth::user()->clients;
        $date = \Carbon\Carbon::today()->subDays(7)->format('Y-m-d');
        $total_active = 0;
        $total_inactive = 0;
        foreach ($users as $user) {
            $is_active = $user->moods->where('created_at', '>=', $date)->count();
            if ($is_active > 0) {
                $total_active += 1;
            } else {
                $total_inactive += 1;
            }
        }
        return [ 'active' => $total_active, 'inactive' => $total_inactive ];
    }

    public function setUserInfo($data)
    {
        $user_info = new $this->user_info;
        $user_info->flag = $data['flag'];
        $user_info->client_id = Auth::user()->id;
        $user_info->sub_emotion_id = $data['sub_emotion_id'];
        $user_info->save();

        return true;
    }

    public function getUserEmotionalInfo()
    {
        return $this->user_info->where([ 'client_id' => Auth::user()->id ])->get();   
    }

    public function payment($data)
    {
        $date = Carbon::now();
        $package = $this->package->find($data['subscription_id']);
        if ($package->subscription == '6 MONTH') {
            $end = $date->copy()->addMonths(6);
        } else if ($package->subscription == '3 MONTH') {
            $end = $date->copy()->addMonths(3);
        } else if ($package->subscription == '1 MONTH') {
            $end = $date->copy()->addMonth();
        } else {
            $end = $date->copy()->addYear();
        }

        $code_id = 0;
        if (isset($data['coupon_code']) && !empty($data['coupon_code'])) {
            $code = $this->code->where('code', $data['coupon_code'])->first();
            $code_id = $code->id;
        } 
        
        $payment = $this->payment;
        $payment->date = $date->format('Y-m-d');
        $payment->transaction_id = '';
        $payment->amount = $data['amount'];
        $payment->subscription_id = $data['subscription_id'];
        $payment->end_date = $end->format('Y-m-d');
        $payment->client_id = Auth::user()->id;
        $payment->user_transaction_id = '';
        $payment->code_id = $code_id;
        $payment->save();

        return true;
    }

    public function updateEmrgncyContactAndPayment($data)
    {

        // $date = Carbon::now();
        // $package = $this->package->find(1);
        // if ($package->subscription == '6 MONTH') {
        //     $end = $date->copy()->addMonths(6);
        // } else if ($package->subscription == '1 MONTH') {
        //     $end = $date->copy()->addMonth();
        // } else {
        //     $end = $date->copy()->addYear();
        // }

        // if ($data['is_payment_done'] == 1) {
        //     $payment = $this->payment;
        //     $payment->date = $date->format('Y-m-d');
        //     $payment->transaction_id = '';
        //     $payment->amount = 0;
        //     $payment->subscription_id = 1;
        //     $payment->end_date = $end->format('Y-m-d');
        //     $payment->client_id = Auth::user()->id;
        //     $payment->user_transaction_id = $data['user_transaction_id'];
        //     $payment->save();
        // }

        $client = $this->client->find(Auth::user()->id);
        $client->emrgncy_contact = $data['emrgncy_contact'];
        $client->save();

        // if (!empty($data['emrgncy_contact'])) {
            
        // }
        return true;
    }
}