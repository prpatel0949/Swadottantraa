<?php
namespace App\Repository;

use DB;
use App\Scale;
use App\ScaleQuestion;
use App\ScaleQuestionAnswer;
use App\Repository\Interfaces\ScaleRepositoryInterface;

class ScaleRepository implements ScaleRepositoryInterface
{
    private $scale, $scaleQuestion, $scaleAnswer;

    public function __construct(Scale $scale, ScaleQuestion $scaleQuestion, ScaleQuestionAnswer $scaleAnswer)
    {
        $this->scale = $scale;
        $this->scaleQuestion = $scaleQuestion;
        $this->scaleAnswer = $scaleAnswer;
    }

    public function create($data)
    {
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
                $scaleQuestion->save();

                foreach ($data['answer'][$key] as $index => $answer) {
                    $scaleAnswer = new $this->scaleAnswer;
                    $scaleAnswer->scale_question_id = $scaleQuestion->id;
                    $scaleAnswer->answer = $answer;
                    $scaleAnswer->answer_value = $data['answer_value'][$key][$index];
                    $scaleAnswer->save();
                }
            }
        });

        return true;
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
        });

        return true;
    }
}