<?php

namespace App\Http\Controllers\Individual;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Individual\ProfileUpdateRequest;
use App\Repository\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    private $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }
    
    public function profile()
    {
        return view('individual.profile', [ 'user' => Auth::user() ]);
    }

    public function profileUpdate(ProfileUpdateRequest $request)
    {
        if ($this->user->update($request->validated(), Auth::user()->id)) {
            return redirect()->route('individual.profile')->with('success', 'Profile Update successfully.');
        }

        return redirect()->route('individual.profile')->with('error', 'Something went wrong happen!');
    }

    public function acceptInvitation($token)
    {
        if ($this->user->acceptInvitation($token)) {
            return redirect()->route('individual.profile')->with('success', 'Franchisee join successfully.');
        }

        return redirect()->route('individual.profile')->with('error', 'Invalid token.');
    }
}
