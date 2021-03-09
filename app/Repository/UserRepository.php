<?php
namespace App\Repository;

use Auth;
use Mail;
use Session;
use App\User;
use App\Invite;
use Carbon\Carbon;
use App\Mail\InviteCreated;
use Illuminate\Support\Facades\Hash;
use App\Repository\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    private $user, $invite;

    public function __construct(User $user, Invite $invite)
    {
        $this->user = $user;
        $this->invite = $invite;
    }

    public function update($data, $id)
    {
        if (isset($data['profile']) && !empty($data['profile'])) {
            $data['profile'] = $data['profile']->store('users/profile');
        } else {
            unset($data['profile']);
        }

        if (isset($data['password']) && !empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $data['dob'] = (isset($data['dob']) && !empty($data['dob']) ? Carbon::parse($data['dob'])->format('Y-m-d') : null);
        $data['gender'] =  (isset($data['gender']) && !empty($data['gender']) ? $data['gender'] : 0);
        return $this->user->find($id)->update($data);
    }

    public function invite($data)
    {
        do {
            $token = str_random();
        }
        while ($this->invite->where('token', $token)->first());
        
        
        $invite = $this->invite->create([
            'email' => $data['email'],
            'token' => $token
        ]);

        $mail = Mail::send('emails.invite', [ 'invite' => $invite ], function ($message) use ($invite) {
            $message->to($invite->email, 'Shreyash');
            $message->subject('SWA Franchisee Invitation');
        });

        // Mail::to($data['email'])->send(new InviteCreated($invite));

        return true;
    }

    public function acceptInvitation($data)
    {
        $invite = $this->invite->where('token', $data)->first();
        if (empty($invite)) {
            return false;
        }

        $user = $this->user->where('email', $invite->email)->first();
        $user->franchisee_id = $invite->created_by;
        $user->save();

        $invite->delete();
        return true;
    }

    public function clients($perPage = 10, $filters)
    {
        $users = $this->user->where('franchisee_id', Auth::user()->id);
        if (isset($filters['search']) && !empty($filters['search'])) {
            $search = $filters['search'];
            $users = $users->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->orWhere('mobile', 'LIKE', "%{$search}%");
            });
        }

        return $users->paginate($perPage);
    }

    public function store($data)
    {
        $password = str_random(8);
        $data['country_code'] = (isset($data['country_code']) ? $data['country_code'] : '');
        $data['password'] = Hash::make($password);
        $user = $this->user->create($data);

        $mail = Mail::send('emails.password', [ 'password' => $password, 'user' => $user ], function ($message) use ($user) {
            $message->to($user->email, $user->name);
            $message->subject('SWA Account Password');
        });

        return true;
    }

    public function all($filters = [])
    {
        if (count($filters)) {
            return $this->user->where($filters)->orderBy('id', 'DESC')->get();
        }

        return $this->user->orderBy('id', 'DESC')->get();
    }

    public function find($id)
    {
        return $this->user->findorfail($id);
    }

    public function destroy($id)
    {
        $user = $this->user->find($id);
        if ($user->users->count() == 0 && empty($user->franchisee)) {
            $user->delete();
            return true;
        }

        return false;
    }

    public function reCheck()
    {
        $tag = Session::get('question_tags');
        $user = $this->user->find(Auth::user()->id);
        $user->tags = $tag;
        $user->last_checked_at = Carbon::now()->format('Y-m-d');
        $user->save();

        Session::forget('question_tags');

        return true;
    }
}