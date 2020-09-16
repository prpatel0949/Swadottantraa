<?php
namespace App\Repository;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Repository\Interfaces\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
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
}