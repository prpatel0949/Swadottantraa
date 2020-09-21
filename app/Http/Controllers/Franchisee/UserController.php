<?php

namespace App\Http\Controllers\Franchisee;

use View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use App\Repository\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    private $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function list(Request $request)
    {
        $users = $this->user->clients(1, $request->all());

        if ($request->ajax()) {
            return Response::json(View::make('franchisee.client_list', array('users' => $users))->render());
        }

        return view('franchisee.clients', [ 'users' => $users ]);
    }

    public function invite(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users,email,type,0'
        ]);

        $this->user->invite($request->all());

        return redirect()->back()->with('success', 'Invitation link send successfully.');
    }
}
