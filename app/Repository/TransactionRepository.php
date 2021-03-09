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

    public function all($filters = [])
    {
        if (count($filters) > 0) {
            $trasactions = $this->transaction;
            if (isset($filters['user_id'])) {
                $trasactions = $trasactions->whereHas('userProgram', function ($query) use ($filters) {
                    return $query->whereIn('user_id', $filters['user_id']);
                });
            }
            return $trasactions->get();
        }

        return $this->transaction->all();
    }

    public function getMonthlyTotal($filters = [])
    {
        $accounting_year = getCurrentYear();
        $results = [];
        $transactions = DB::table('transactions')
            ->select(DB::raw('SUM(transactions.amount) as total, MONTH(transactions.created_at) as month'))
            ->join('user_programs', 'user_programs.id', 'transactions.user_program_id')
            ->groupBy(DB::raw('YEAR(transactions.created_at) DESC, MONTH(transactions.created_at) DESC'))
            ->whereBetween('transactions.created_at', [ $accounting_year['start_date'], $accounting_year['end_date'] ]);
        if (isset($filters['user_id'])) {
            $transactions = $transactions->whereIn('user_id', $filters['user_id']);
        }
        $transactions = $transactions->get();
        
        for ($i = 4; $i <= 12; $i++) {
            $month_total = $transactions->where('month', $i)->first();
            $results[] = (double) (!empty($month_total) ? $month_total->total : 0);
        }

        for ($i = 1; $i <= 3; $i++) {
            $month_total = $transactions->where('month', $i)->first();
            $results[] = (double) (!empty($month_total) ? $month_total->total : 0);
        }

        return $results;
    }
}