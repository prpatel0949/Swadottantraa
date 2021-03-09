<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Interfaces\UserRepositoryInterface;
use App\Repository\Interfaces\ProgramRepositoryInterface;
use App\Repository\Interfaces\TransactionRepositoryInterface;

class DashboardController extends Controller
{
    private $user, $transaction, $program;

    public function __construct(
        UserRepositoryInterface $user,
        TransactionRepositoryInterface $transaction,
        ProgramRepositoryInterface $program
    )
    {
        $this->user = $user;
        $this->transaction = $transaction;
        $this->program = $program;
    }

    public function index()
    {
        return view('admin.dashboard', [
            'users' => $this->user->all(),
            'transactions' => $this->transaction->all(),
            'monthly_transactions' => $this->transaction->getMonthlyTotal(),
            'programs' => $this->program->getTopPrograms(),
            'pending_evolutions' => $this->program->answers()->where('is_read', 0),
        ]);
    }
}
