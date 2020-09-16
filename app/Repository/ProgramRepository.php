<?php
namespace App\Repository;

use DB;
use Auth;
use App\Program;
use Carbon\Carbon;
use App\Transaction;
use App\UserProgram;
use App\Repository\Interfaces\ProgramRepositoryInterface;

class ProgramRepository implements ProgramRepositoryInterface
{
    private $program, $userProgram, $transaction;

    public function __construct(Program $program, UserProgram $userProgram, Transaction $transaction)
    {
        $this->program = $program;
        $this->userProgram = $userProgram;
        $this->transaction = $transaction;
    }

    public function all()
    {
        return $this->program->all();
    }

    public function subscribe($request)
    {
        DB::transaction(function () use ($request) {
            $tnxId = explode('/', $request->txnid);
            $now = Carbon::now();
            $end = $now->copy()->addYear();
            $userProgram = $this->userProgram;
            $userProgram->program_id = $tnxId[1];
            $userProgram->user_id = Auth::user()->id;
            $userProgram->subscribe_date = $now->format('Y-m-d');
            $userProgram->end_date = $end->format('Y-m-d');
            $userProgram->amount = $request->amount;
            $userProgram->save();

            $transaction = $this->transaction;
            $transaction->user_program_id = $userProgram->id;
            $transaction->amount = $request->amount;
            $transaction->payuMoneyId = $request->payuMoneyId;
            $transaction->save();
        });

        return;
    }
}