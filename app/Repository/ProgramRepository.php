<?php
namespace App\Repository;

use DB;
use Auth;
use Storage;
use App\Option;
use App\Result;
use App\Program;
use App\StepScale;
use Carbon\Carbon;
use App\StageAccess;
use App\StepWorkout;
use App\Transaction;
use App\UserProgram;
use App\ProgramStage;
use App\AnswerComment;
use App\ProgramAnswer;
use App\StepAttachment;
use App\ProgramStageStep;
use App\ScaleWorkoutSequence;
use Illuminate\Support\Facades\Log;
use App\Repository\Interfaces\ProgramRepositoryInterface;

class ProgramRepository implements ProgramRepositoryInterface
{
    private $program, $userProgram, $transaction, $result, $option, $stage, $step, $scale, $workout, $attachment, $sequencce, $answer, $access, $comment;

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
        StepAttachment $attachment,
        ScaleWorkoutSequence $sequence,
        ProgramAnswer $answer,
        StageAccess $access,
        AnswerComment $comment
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
        $this->sequence = $sequence;
        $this->answer = $answer;
        $this->access = $access;
        $this->comment = $comment;
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
                $transaction->txnid = $request->txnid;
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
            $program->time = $data['year'].'-'.$data['month'].'-'.$data['day'];
            $program->type = $data['type'];
            $program->is_active = $data['is_live'];
            $program->is_multiple = (isset($data['is_multiple']) && !empty($data['is_multiple']) ? $data['is_multiple'] : 0);
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

                            $storeScale = [];
                            if (!empty($data['scales'][$index][$key])) {
                                foreach ($data['scales'][$index][$key] as $k1 => $value) {
                                    $scale = new $this->scale;
                                    $scale->step_id = $step->id;
                                    $scale->scale_id = $value;
                                    $scale->save();
                                    $storeScale[$index][$key][$k1] = $scale->id;
                                }
                            }

                            $storeWorkout = [];
                            if (!empty($data['workouts'][$index][$key])) {
                                foreach ($data['workouts'][$index][$key] as $k1 => $value) {
                                    $workout = new $this->workout;
                                    $workout->step_id = $step->id;
                                    $workout->workout_id = $value;
                                    $workout->save();
                                    $storeWorkout[$index][$key][$k1] = $workout->id;
                                }
                            }

                            $storeAttachment = [];
                            if (!empty($data['attachment'][$index][$key])) {
                                foreach ($data['attachment'][$index][$key] as $k1 => $value) {
                                    $img = $value->store('attachments');
                                    $attachment = new $this->attachment;
                                    $attachment->step_id = $step->id;
                                    $attachment->image = $img;
                                    $attachment->save();
                                    $storeAttachment[$index][$key][$k1] = $attachment->id;
                                }
                            }
                            
                            if (!empty($data['innerOrder'][$index][$key])) {
                                foreach ($data['innerOrder'][$index][$key] as $key1 => $value) {
                                    $type = $data['innerType'][$index][$key][$key1];
                                    $orderNo = $data['innerOrder'][$index][$key][$key1];
                                    $sequence = new $this->sequence;
                                    if ($type == 'scale') {
                                        $sequence->typable_type = get_class($this->scale);
                                        $sequence->typable_id = $storeScale[$index][$key][$orderNo];
                                    } elseif ($type == 'workout') {
                                        $sequence->typable_type = get_class($this->workout);
                                        $sequence->typable_id = $storeWorkout[$index][$key][$orderNo];
                                    } else {
                                        $sequence->typable_type = get_class($this->attachment);
                                        $sequence->typable_id = $storeAttachment[$index][$key][$orderNo];
                                    }
                                    $sequence->step_id = $step->id;
                                    $sequence->sequence = $value;
                                    $sequence->save();
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

    public function update($data, $id)
    {
        DB::transaction(function () use ($data, $id) {
            $program = $this->program->find($id);
            $image = '';
            if (!empty($data['image'])) {
                Storage::delete($program->image);
                $program->image = $data['image']->store('programs');
            }
            $program->title = $data['title'];
            $program->description = $data['description'];
            $program->cost = $data['cost'];
            $program->tag = $data['tag'];
            $program->time = $data['year'].'-'.$data['month'].'-'.$data['day'];
            $program->is_multiple = $program->is_multiple = (isset($data['is_multiple']) && !empty($data['is_multiple']) ? $data['is_multiple'] : 0);
            $program->save();

            $allStage = [];
            if (!empty($data['stage_name'])) {
                foreach ($data['stage_name'] as $index => $value) {
                    $stage_id = (isset($data['stage_id'][$index]) ? $data['stage_id'][$index] : '');
                    if (!empty($stage_id)) {
                        $stage = $this->stage->find($stage_id);
                    } else {
                        $stage = new $this->stage;
                        $stage->program_id = $program->id;
                    }
                    $stage->title = $value;
                    $stage->description = $data['stage_description'][$index];
                    $stage->order = $data['order'][$index];
                    $stage->save();
                    $allStage[] = $stage->id;

                    $allSteps = [];
                    if (!empty($data['step_name'][$index])) {
                        foreach ($data['step_name'][$index] as $key => $value) {
                            $step_id = (isset($data['step_id'][$index]) ? $data['step_id'][$index][$key] : '');
                            if (!empty($step_id)) {
                                $step = $this->step->find($step_id);
                            } else {
                                $step = new $this->step;
                                $step->program_stage_id = $stage->id;
                            }
                            $step->title = $value;
                            $step->description = $data['step_description'][$index][$key];
                            $step->comment = (isset($data['comment']) && isset($data['comment'][$index]) && isset($data['comment'][$index][$key]) ? $data['comment'][$index][$key] : '');
                            $step->save();
                            $allSteps[] = $step->id;
                        }

                        $allScales = [];
                        $storeScale = [];
                        
                        if (!empty($data['scales'][$index][$key])) {
                            foreach ($data['scales'][$index][$key] as $k1 => $value) {
                                $scale = $this->scale->where([ 'step_id' => $step->id, 'scale_id' => $value ])->first();
                                if (empty($scale)) {
                                    $scale = new $this->scale;
                                    $scale->step_id = $step->id;
                                    $scale->scale_id = $value;
                                    $scale->save();
                                }
                                $scale = $this->scale->firstorcreate([ 'step_id' => $step->id, 'scale_id' => $value ]);
                                $storeScale[$index][$key][$k1] = $scale->id;
                                $allScales[] = $scale->id;
                            }
                        }

                        $this->scale->where('step_id', $step->id)->whereNotIn('id', $allScales)->delete();

                        $allWorkouts = [];
                        $storeWorkout = [];
                        if (!empty($data['workouts'][$index][$key])) {
                            foreach ($data['workouts'][$index][$key] as $k1 => $value) {
                                $workout = $this->workout->firstorcreate([ 'step_id' => $step->id, 'workout_id' => $value ]);
                                $allWorkouts[] = $workout->id;
                                $storeWorkout[$index][$key][$k1] = $workout->id;
                            }
                        }

                        $this->workout->where('step_id', $step->id)->whereNotIn('id', $allWorkouts)->delete();

                        $allAttachment = [];
                        $storeAttachment = [];
                        if (!empty($data['attachment'][$index][$key])) {
                            foreach ($data['attachment'][$index][$key] as $k1 => $value) {
                                if (is_file($value)) {
                                    $img = $value->store('attachments');
                                    $attachment = new $this->attachment;
                                    $attachment->step_id = $step->id;
                                    $attachment->image = $img;
                                    $attachment->save();
                                    $allAttachment[] = $attachment->id;
                                    $storeAttachment[$index][$key][$k1] = $attachment->id;
                                } else {
                                    $allAttachment[] = $value;
                                    $storeAttachment[$index][$key][$k1] = $value;
                                }
                            }
                        }

                        $this->attachment->where('step_id', $step->id)->whereNotIn('id', $allAttachment)->delete();

                        $this->sequence->where('step_id', $step->id)->delete(); 
                        if (!empty($data['innerOrder'][$index][$key])) {
                            foreach ($data['innerOrder'][$index][$key] as $key1 => $value) {
                                $type = $data['innerType'][$index][$key][$key1];
                                $orderNo = $data['innerOrder'][$index][$key][$key1];
                                $sequence = new $this->sequence;
                                if ($type == 'scale') {
                                    $sequence->typable_type = get_class($this->scale);
                                    $sequence->typable_id = $storeScale[$index][$key][$orderNo];
                                } elseif ($type == 'workout') {
                                    $sequence->typable_type = get_class($this->workout);
                                    $sequence->typable_id = $storeWorkout[$index][$key][$orderNo];
                                } else {
                                    $sequence->typable_type = get_class($this->attachment);
                                    $sequence->typable_id = $storeAttachment[$index][$key][$orderNo];
                                }
                                $sequence->step_id = $step->id;
                                $sequence->sequence = $value;
                                $sequence->save();
                            }
                        }
                    }

                    $deleteSteps = $this->step->where('program_stage_id', $stage->id)->whereNotIn('id', $allSteps)->get();
                    foreach ($deleteSteps as $step) {
                        $step->scales()->delete();
                        $step->workouts()->delete();
                        foreach ($step->attachments as $attachment) {
                            Storage::delete($attachment->image);
                        }
                        $step->attachments()->delete();
                        $step->delete();
                    }
                }
            }

            $deleteStages = $this->stage->where('program_id', $program->id)->whereNotIn('id', $allStage)->get();
            foreach ($deleteStages as $stage) {
                foreach ($stage->steps as $step) {
                    $step->scales()->delete();
                    $step->workouts()->delete();
                    foreach ($step->attachments as $attachment) {
                        Storage::delete($attachment->image);
                    }
                    $step->attachments()->delete();
                    $step->delete();
                }
                $stage->delete();
            }
        });
        return true;
    }

    public function destroy($id)
    {
        $program = $this->program->find($id);
        foreach ($program->stages as $stage) {
            foreach ($stage->steps as $step) {
                $step->scales()->delete();
                $step->workouts()->delete();
                foreach ($step->attachments as $attachment) {
                    Storage::delete($attachment->image);
                }
                $step->attachments()->delete();
                $step->sequences()->delete();
                $step->delete();
            }
            $stage->delete();
        }
        $program->delete();
        return true;
    }

    public function scaleQuestionAnswer($data, $id)
    {
        try {
            $setno = $this->answer->max('set_no');
            $setno = (empty($setno) ? 1 : $setno + 1);
            if (isset($data['scale_id'])) {
                foreach ($data['question'] as $key => $question) {
                    $answer = new $this->answer;
                    $answer->set_no = $setno;
                    $answer->program_id = request()->id;
                    $answer->step_id = $data['step_id'];
                    $answer->scale_question_id = $key;
                    $answer->scale_question_answer_id = $question;
                    $answer->type = $data['type'][$key];
                    $answer->save();
                }
            } else if (isset($data['workout_id'])) {
                foreach ($data['question'] as $key => $question) {
                    $answer = new $this->answer;
                    $answer->set_no = $setno;
                    $answer->program_id = request()->id;
                    $answer->step_id = $data['step_id'];
                    $answer->workout_question_id = $key;
                    $answer->type = $data['type'][$key];
                    if ($data['type'][$key] == 1) {
                        $answer->answer = $question;
                    } else {
                        $answer->workout_question_answer_id = $question;
                    }
                    $answer->save();
                }
            }

            return true;


        } catch (Exception $ex) {
            dd($ex->getMessage());
        }
    }

    public function updateStatus($id)
    {
        $program = $this->program->find($id);
        if ($program->is_active == 1) {
            $program->is_active = 0;
        } else {
            $program->is_active = 1;
        }
        $program->save();
        return true;
    }

    public function active()
    {
        return $this->program->active()->get();
    }

    public function answers()
    {
        return $this->answer->groupBy('set_no')->orderBy('id', 'DESC')->get();
    }

    public function answer($id)
    {
        $answer = $this->answer->find($id);
        $this->answer->where('set_no', $answer->set_no)->update([ 'is_read' => 1 ]);
        return $this->answer->where('set_no', $answer->set_no)->get();
    }

    public function stageAccess($data, $id)
    {
        $allAccess = [];
        if (isset($data['stages']) && !empty($data['stages'])) {
            foreach($data['stages'] as $stage) {
                $access = $this->access->firstorcreate([ 'program_id' => $id, 'stage_id' => $stage, 'user_id' => $data['user_id'] ]);
                $allAccess[] = $access['id'];
            }
        }

        $this->access->where([ 'program_id' => $id, 'user_id' => $data['user_id'] ])->whereNotIn('id', $allAccess)->delete();

        return true;
    }

    public function getAccess($id, $user_id)
    {
        return $this->access->where([ 'program_id' => $id, 'user_id' => $user_id ])->get();
    }

    public function copy($id)
    {
        $program;
        DB::transaction(function () use ($id, &$program) {
            $program = $this->program->find($id);
            $newProgram = $program->replicate();
            $newProgram->save();

            $stages = $this->stage->where('program_id', $program->id);
            foreach ($stages as $stage) {
                $newStage = $stage->replicate();
                $newStage->program_id = $newProgram->id;
                $newStage->save();

                foreach ($stage->steps as $step) {
                    $newStep = $step->replicate();
                    $newStep->program_stage_id = $newStage->id;
                    $newStep->save();

                    foreach ($step->sequences as $sequence) {
                        if ($sequence->type == 'App\StepScale') {
                            $scale = new $this->scale;
                            $scale->step_id = $newStep->id;
                            $scale->scale_id = $sequence->typable->scale_id;
                            $scale->save();

                            $newSequence = $sequence->replicate();
                            $newSequence->typable_id = $scale->id;
                            $newSequence->step_id = $newStep->id;
                            $newSequence->save();
                            
                        } else if ($sequence->type == 'App\StepWorkout') {
                            $workout = new $this->workout;
                            $workout->step_id = $newStep->id;
                            $workout->workout_id = $sequence->typable->workout_id;
                            $workout->save();

                            $newSequence = $sequence->replicate();
                            $newSequence->typable_id = $workout->id;
                            $newSequence->step_id = $newStep->id;
                            $newSequence->save();

                        } else {
                            $attachment = new $this->attachment;
                            $attachment->step_id = $newStep->id;
                            $attachment->image = $sequence->typable->image;
                            $attachment->save();

                            $newSequence = $sequence->replicate();
                            $newSequence->typable_id = $attachment->id;
                            $newSequence->step_id = $newStep->id;
                            $newSequence->save();
                        }
                    }
                }                         
            }
        });

        return $program;
    }

    public function answerComment($data, $id)
    {
        $answer = $this->answer->find($id);
        $all_answer = $this->answer->where('set_no', $answer->set_no)->update([ 'is_resubmit' => 1 ]);

        $comment = new $this->comment;
        $comment->program_answer_id = $id;
        $comment->comment = $data['comment'];
        $comment->save();

        return true;
    }

    public function usersAnswers($step_id, $user_id)
    {
        return $this->answer->where([ 'step_id' => $step_id, 'user_id' => $user_id ])->get();
    }
}