<?php
namespace App\Repository;

use DB;
use Carbon\Carbon;
use App\Transaction;
use App\Repository\Interfaces\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{
    private $transaction;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
    }

    public function all()
    {
        return $this->transaction->all();
    }

    public function getMonthlyTotal()
    {
        $results = [];
        $transactions = DB::table('transactions')
            ->select(DB::raw('SUM(amount) as total, MONTH(created_at) as month'))
            ->groupBy(DB::raw('YEAR(created_at) DESC, MONTH(created_at) DESC'))
            ->whereRaw('YEAR(created_at) = '.Carbon::now()->format('Y'))->get();
        
        for ($i = 1; $i <= 12; $i++) {
            $month_total = $transactions->where('month', $i)->first();
            $results[] = (double) (!empty($month_total) ? $month_total->total : 0);
        }

        return $results;
    }
}