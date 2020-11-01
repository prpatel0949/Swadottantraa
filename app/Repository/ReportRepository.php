<?php
namespace App\Repository;

use Carbon\Carbon;
use App\Transaction;
use App\Repository\Interfaces\ReportRepositoryInterface;

class ReportRepository implements ReportRepositoryInterface
{
    private $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function programs()
    {
        $transactions = $this->transaction->orderBy('id', 'DESC')->get();
        $allData = [];
        foreach ($transactions as $transaction) {
            $rowRes = new \StdClass;
            $rowRes->id = $transaction->id;
            $rowRes->name = $transaction->userProgram->program->title;
            $rowRes->client = $transaction->userProgram->user->name;
            $rowRes->franchisee = (!empty($transaction->userProgram->user->franchisee) ? $transaction->userProgram->user->franchisee->name : '');
            $rowRes->date = Carbon::parse($transaction->created_at)->format('d-m-Y');
            $rowRes->transaction = $transaction->payuMoneyId;
            $rowRes->amount = $transaction->amount;
            $allData[] = $rowRes;
        }

        return response()->json([ 'data' => $allData ], 200);
    }   
}