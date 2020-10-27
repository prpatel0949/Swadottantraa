<?php
namespace App\Repository;

use DB;
use Auth;
use App\Option;
use App\Result;
use App\Program;
use App\StepScale;
use Carbon\Carbon;
use App\StepWorkout;
use App\Transaction;
use App\UserProgram;
use App\ProgramStage;
use App\StepAttachment;
use App\ProgramStageStep;
use Illuminate\Support\Facades\Log;
use App\Repository\Interfaces\ProgramRepositoryInterface;

class ProgramRepository implements ProgramRepositoryInterface
{
    private $program, $userProgram, $transaction, $result, $option, $stage, $step, $scale, $workout, $attachment;

    public function __construct(
        Program $program,
        UserProgram $userProgram,
        Transaction $transaction,
        Result $result,
        Option $option,
        ProgramStage $stage,
        ProgramStageStep $step,
        StepScale $scale,
        StepWorkout $workout,
        StepAttachment $attachment
    )
    {
        $this->program = $program;
        $this->userProgram = $userProgram;
        $this->transaction = $transaction;
        $this->result = $result;
        $this->option = $option;
        $this->stage = $stage;
        $this->step = $step;
        $this->scale = $scale;
        $this->workout = $workout;
        $this->attachment = $attachment;
    }

    public function all()
    {
        return $this->program->orderBy('id', 'DESC')->get();
    }

    public function subscribe($request)
    {
        try {
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
    
            return true;
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return false;
        }
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

    public function store($data)
    {
        DB::transaction(function () use ($data) {
            $image = '';
            if (!empty($data['image'])) {
                $image = $data['image']->store('programs');
            }
            $program = $this->program;
            $program->image = $image;
            $program->title = $data['title'];
            $program->description = $data['description'];
            $program->cost = $data['cost'];
            $program->tag = $data['tag'];
            $program->time = $data['time'];
            $program->type = $data['type'];
            $program->save();

            if (!empty($data['stage_name'])) {
                foreach ($data['stage_name'] as $index => $value) {
                    $stage = new $this->stage;
                    $stage->program_id = $program->id;
                    $stage->title = $value;
                    $stage->description = $data['stage_description'][$index];
                    $stage->order = $data['order'][$index];
                    $stage->save();
                    
                    if (!empty($data['step_name'][$index])) {
                        foreach ($data['step_name'][$index] as $key => $value) {
                            $step = new $this->step;
                            $step->program_stage_id = $stage->id;
                            $step->title = $value;
                            $step->description = $data['step_description'][$index][$key];
                            $step->comment = (isset($data['comment']) ? $data['comment'][$index][$key] : '');
                            $step->save();

                            if (!empty($data['scales'][$index][$key])) {
                                foreach ($data['scales'][$index][$key] as $value) {
                                    $scale = new $this->scale;
                                    $scale->step_id = $step->id;
                                    $scale->scale_id = $value;
                                    $scale->save();
                                }
                            }

                            if (!empty($data['workouts'][$index][$key])) {
                                foreach ($data['workouts'][$index][$key] as $value) {
                                    $workout = new $this->workout;
                                    $workout->step_id = $step->id;
                                    $workout->workout_id = $value;
                                    $workout->save();
                                }
                            }

                            if (!empty($data['attachment'][$index][$key])) {
                                foreach ($data['attachment'][$index][$key] as $value) {
                                    $img = $value->store('attachments');
                                    $attachment = new $this->attachment;
                                    $attachment->step_id = $step->id;
                                    $attachment->image = $img;
                                    $attachment->save();
                                }
                            }
                        }
                    }
                }
            }
        });

        return true;
    }

    public function find($id)
    {
        return $this->program->find($id);
    }
}