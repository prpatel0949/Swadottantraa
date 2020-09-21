<?php
namespace App\Repository;

use DB;
use Auth;
use App\Option;
use App\Result;
use App\Program;
use Carbon\Carbon;
use App\Transaction;
use App\UserProgram;
use App\Repository\Interfaces\ProgramRepositoryInterface;

class ProgramRepository implements ProgramRepositoryInterface
{
    private $program, $userProgram, $transaction, $result, $option;

    public function __construct(
        Program $program,
        UserProgram $userProgram,
        Transaction $transaction,
        Result $result,
        Option $option
    )
    {
        $this->program = $program;
        $this->userProgram = $userProgram;
        $this->transaction = $transaction;
        $this->result = $result;
        $this->option = $option;
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

    public function findorfail($id)
    {
        return $this->program->findorfail($id);
    }

    public function storeAnswer($data, $id)
    {
        $corrent = 0;
        $wrong = 0;
        foreach ($data['question'] as $question) {
            $answer = $this->option->where('question_id', $question)->get();
            $currect_option = $answer->where('is_correct')->first();
            if ($currect_option->id == $data['answer'][$question]) {
                $corrent += 1;
            } else {
                $wrong += 1;  
            }
        }

        $result = $this->result;
        $result->prog_id = $id;
        $result->user_id = Auth::user()->id;
        $result->total_question = count($data['question']);
        $result->correct_answer = $corrent;
        $result->wrong_answer = $wrong;
        $result->save();
        
        return true;
    }
}