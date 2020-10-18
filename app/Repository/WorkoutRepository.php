<?php
namespace App\Repository;

use DB;
use App\Workout;
use App\WorkoutQuestion;
use App\WorkoutQuestionAnswer;
use Illuminate\Support\Facades\Log;
use App\Repository\Interfaces\WorkoutRepositoryInterface;

class WorkoutRepository implements WorkoutRepositoryInterface
{
    private $workout, $workoutQuestion, $workoutQuestionAnswer;

    public function __construct(Workout $workout, WorkoutQuestion $workoutQuestion, WorkoutQuestionAnswer $workoutQuestionAnswer)
    {
        $this->workout = $workout;
        $this->workoutQuestion = $workoutQuestion;
        $this->workoutQuestionAnswer = $workoutQuestionAnswer;
    }

    public function create($data)
    {
        try {
            DB::transaction(function () use ($data) {
                $workout = $this->workout;
                $workout->title = $data['title'];
                $workout->save();

                if (!empty($data['question'])) {
                    foreach ($data['question'] as $key => $question) {
                        $workoutQuestion = new $this->workoutQuestion;
                        $workoutQuestion->workout_id = $workout->id;
                        $workoutQuestion->question = $question;
                        $workoutQuestion->description = $data['description'][$key];
                        $workoutQuestion->answer_type = $data['answer_type'][$key];
                        $workoutQuestion->order = $data['order'][$key];
                        $workoutQuestion->save();

                        if ($data['answer_type'][$key] == 1) {
                            $workoutQuestionAnswer = new $this->workoutQuestionAnswer;
                            $workoutQuestionAnswer->workout_question_id = $workoutQuestion->id;
                            $workoutQuestionAnswer->answer = $data['answer'][$key];
                            $workoutQuestionAnswer->save();
                        } else {
                            if (!empty($data['answer'][$key])) {
                                foreach ($data['answer'][$key] as $answer) {
                                    $workoutQuestionAnswer = new $this->workoutQuestionAnswer;
                                    $workoutQuestionAnswer->workout_question_id = $workoutQuestion->id;
                                    $workoutQuestionAnswer->answer = $answer;
                                    $workoutQuestionAnswer->save();
                                }
                            }
                        }
                    }
                }
            });

            return true;
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return false;
        }
    }

    public function all()
    {
        return $this->workout->orderBy('id', 'DESC')->get();
    }

    public function find($id)
    {
        return $this->workout->find($id);
    }

    public function update($data, $id)
    {
        try {

            DB::transaction(function () use ($data, $id) {
                $workout = $this->workout->find($id);
                $workout->title = $data['title'];
                $workout->save();

                $allQuestions = [];
                if (!empty($data['question'])) {
                    foreach ($data['question'] as $key => $question) {
                        if (!empty($data['question_id'][$key])) {
                            $workoutQuestion = $this->workoutQuestion->find($data['question_id'][$key]);
                        } else {
                            $workoutQuestion = new $this->workoutQuestion;
                            $workoutQuestion->workout_id = $workout->id;
                        }
                        $workoutQuestion->question = $question;
                        $workoutQuestion->description = $data['description'][$key];
                        $workoutQuestion->answer_type = $data['answer_type'][$key];
                        $workoutQuestion->order = $data['order'][$key];
                        $workoutQuestion->save();
                        $allQuestions[] = $workoutQuestion->id;

                        $allAnswers = [];
                        if ($data['answer_type'][$key] == 1) {
                            if (!empty($data['answer_id'][$key])) {
                                $workoutQuestionAnswer = $this->workoutQuestionAnswer->find($data['answer_id'][$key]);
                            } else {
                                $workoutQuestionAnswer = new $this->workoutQuestionAnswer;
                                $workoutQuestionAnswer->workout_question_id = $workoutQuestion->id;
                            }
                            $workoutQuestionAnswer->answer = $data['answer'][$key];
                            $workoutQuestionAnswer->save();
                            $allAnswers[] = $workoutQuestionAnswer->id;
                        } else {
                            if (!empty($data['answer'][$key])) {
                                foreach ($data['answer'][$key] as $index => $answer) {
                                    if (!empty($data['answer_id'][$key][$index])) {
                                        $workoutQuestionAnswer = $this->workoutQuestionAnswer->find($data['answer_id'][$key][$index]);
                                    } else {
                                        $workoutQuestionAnswer = new $this->workoutQuestionAnswer;
                                        $workoutQuestionAnswer->workout_question_id = $workoutQuestion->id;
                                    }
                                    $workoutQuestionAnswer = new $this->workoutQuestionAnswer;
                                    $workoutQuestionAnswer->workout_question_id = $workoutQuestion->id;
                                    $workoutQuestionAnswer->answer = $answer;
                                    $workoutQuestionAnswer->save();
                                    $allAnswers[] = $workoutQuestionAnswer->id;
                                }
                            }
                        }

                        $this->workoutQuestionAnswer->where('workout_question_id', $workoutQuestion->id)->whereNotIn('id', $allAnswers)->delete();
                    }
                }

                $delQuestion = $this->workoutQuestion->where('workout_id', $id)->whereNotIn('id', $allQuestions)->get();
                foreach ($delQuestion as $key => $value) {
                    $value->answers()->delete();
                    $value->delete();
                }
            });

            return true;

        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return false;
        }
    }
}