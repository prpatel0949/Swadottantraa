<?php
namespace App\Repository;

use DB;
use App\Scale;
use App\ScaleQuestion;
use App\ScaleQuestionAnswer;
use App\ScaleInterpreatation;
use Illuminate\Support\Facades\Log;
use App\Repository\Interfaces\ScaleRepositoryInterface;

class ScaleRepository implements ScaleRepositoryInterface
{
    private $scale, $scaleQuestion, $scaleAnswer, $interpatation;

    public function __construct(Scale $scale, ScaleQuestion $scaleQuestion, ScaleQuestionAnswer $scaleAnswer, ScaleInterpreatation $interpatation)
    {
        $this->scale = $scale;
        $this->scaleQuestion = $scaleQuestion;
        $this->scaleAnswer = $scaleAnswer;
        $this->interpatation = $interpatation;
    }

    public function create($data)
    {
        try {
            DB::transaction(function () use ($data) {
                $scale = $this->scale;
                $scale->title = $data['title'];
                $scale->description = $data['scale_description'];
                $scale->interpreatation = $data['interpreatation'];
                $scale->save();

                foreach ($data['question'] as $key => $question) {
                    $scaleQuestion = new $this->scaleQuestion;
                    $scaleQuestion->scale_id = $scale->id;
                    $scaleQuestion->question = $question;
                    $scaleQuestion->description = $data['description'][$key];
                    $scaleQuestion->order = $data['order'][$key];
                    $scaleQuestion->is_interpreatation = (isset($data['is_interpreatation'][$key]) ? $data['is_interpreatation'][$key] : 0);
                    $scaleQuestion->save();

                    foreach ($data['answer'][$key] as $index => $answer) {
                        $scaleAnswer = new $this->scaleAnswer;
                        $scaleAnswer->scale_question_id = $scaleQuestion->id;
                        $scaleAnswer->answer = $answer;
                        $scaleAnswer->answer_value = $data['answer_value'][$key][$index];
                        $scaleAnswer->save();
                    }
                }

                if (!empty($data['start'])) {
                    foreach ($data['start'] as $key => $start) {
                        $interpatation = new $this->interpatation;
                        $interpatation->start = $start;
                        $interpatation->end = $data['end'][$key];
                        $interpatation->value = $data['value'][$key];
                        $interpatation->scale_id = $scale->id;
                        $interpatation->save();
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
        return $this->scale->orderBy('id', 'DESC')->get();
    }

    public function findorfail($id)
    {
        return $this->scale->findorfail($id);
    }

    public function update($data, $id)
    {
        try {
            DB::transaction(function () use ($data, $id) {
                $scale = $this->scale->find($id);
                $scale->title = $data['title'];
                $scale->description = $data['scale_description'];
                $scale->interpreatation = $data['interpreatation'];
                $scale->save();

                $allQuestion = [];
                foreach ($data['question'] as $key => $question) {
                    if (!empty($data['question_id'][$key])) {
                        $scaleQuestion = $this->scaleQuestion->find($data['question_id'][$key]);
                    } else {
                        $scaleQuestion = new $this->scaleQuestion;
                        $scaleQuestion->scale_id =  $scale->id;
                    }
                    $scaleQuestion->question = $question;
                    $scaleQuestion->description = $data['description'][$key];
                    $scaleQuestion->order = $data['order'][$key];
                    $scaleQuestion->is_interpreatation = (isset($data['is_interpreatation'][$key]) ? $data['is_interpreatation'][$key] : 0);
                    $scaleQuestion->save();
                    $allQuestion[] = $scaleQuestion->id;

                    $allAnswer = [];
                    foreach ($data['answer'][$key] as $index => $answer) {
                        if (!empty($data['answer_id'][$key][$index])) {
                            $scaleAnswer = $this->scaleAnswer->find($data['answer_id'][$key][$index]);
                        } else {
                            $scaleAnswer = new $this->scaleAnswer;
                            $scaleAnswer->scale_question_id = $scaleQuestion->id;
                        }
                        $scaleAnswer->answer = $answer;
                        $scaleAnswer->answer_value = $data['answer_value'][$key][$index];
                        $scaleAnswer->save();
                        $allAnswer[] = $scaleAnswer->id;
                    }
                    $this->scaleAnswer->where('scale_question_id', $scaleQuestion->id)->whereNotIn('id', $allAnswer)->delete();
                }

                $questions = $this->scaleQuestion->where('scale_id', $scale->id)->whereNotIn('id', $allQuestion);
                foreach ($questions as $question) {
                    $question->answers()->delete();
                    $question->delete();
                }

                $allInter = [];
                if (!empty($data['start'])) {
                    foreach ($data['start'] as $key => $start) {
                        if (!empty($data['inter_ids'][$key])) {
                            $interpatation = $this->interpatation->find($data['inter_ids'][$key]);
                        } else {
                            $interpatation = new $this->interpatation;
                            $interpatation->scale_id = $scale->id;
                        }
                        $interpatation->start = $start;
                        $interpatation->end = $data['end'][$key];
                        $interpatation->value = $data['value'][$key];
                        $interpatation->save();
                        $allInter[] = $interpatation->id;
                    }
                }

                $this->interpatation->where('scale_id', $scale->id)->whereNotIn('id', $allInter)->delete();

            });
            return true;
        } catch (Exception $ex) {
            Log::error($ex->getMessage());
            return false;
        }
    }

    public function destroy($id)
    {
        $scale = $this->scale->find($id);
        if ($scale->programs->count() > 0) {
            return false;
        }

        foreach ($scale->questions as $question) {
            $question->answers()->delete();
            $question->delete();
        }

        $scale->delete();
    }
}