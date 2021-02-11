<?php

namespace App\Http\Controllers\Franchisee;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Interfaces\UserRepositoryInterface;
use App\Repository\Interfaces\TransactionRepositoryInterface;

class DashboardController extends Controller
{
    private $user, $transaction;

    public function __construct(UserRepositoryInterface $user, TransactionRepositoryInterface $transaction)
    {
        $this->user = $user;
        $this->transaction = $transaction;
    }

    public function index()
    {
        $franchisee = Auth::user();
        return view('franchisee.dashboard', [
            'users' => $this->user->all([ 'franchisee_id' => $franchisee->id ]),
            'transactions' => $this->transaction->all([ 'user_id' => $franchisee->users->pluck('id') ]),
            'monthly_transactions' => $this->transaction->getMonthlyTotal([ 'user_id' => $franchisee->users->pluck('id')->toArray() ]),
        ]);
    }
}
