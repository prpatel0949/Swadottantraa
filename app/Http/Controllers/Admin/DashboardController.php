<?php

namespace App\Http\Controllers\Admin;

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
        return view('admin.dashboard', [
            'users' => $this->user->all(),
            'transactions' => $this->transaction->all(),
            'monthly_transactions' => $this->transaction->getMonthlyTotal()
        ]);
    }
}
