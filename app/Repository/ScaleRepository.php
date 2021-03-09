<?php
namespace App\Repository;

use DB;
use App\Scale;
use App\ScaleQuestion;
use App\ScaleQuestionAnswer;
use App\ScaleInterpreatation;
use App\ScaleInterpreatationValue;
use Illuminate\Support\Facades\Log;
use App\ScaleInterpreatationQuestion;
use App\Repository\Interfaces\ScaleRepositoryInterface;

class ScaleRepository implements ScaleRepositoryInterface
{
    private $scale, $scaleQuestion, $scaleAnswer, $interpatation, $interpatationQuestion, $interpatationValue;

    public function __construct(
        Scale $scale,
        ScaleQuestion $scaleQuestion,
        ScaleQuestionAnswer $scaleAnswer,
        ScaleInterpreatation $interpatation,
        ScaleInterpreatationQuestion $interpatationQuestion,
        ScaleInterpreatationValue $interpatationValue
    )
    {
        $this->scale = $scale;
        $this->scaleQuestion = $scaleQuestion;
        $this->scaleAnswer = $scaleAnswer;
        $this->interpatation = $interpatation;
        $this->interpatationQuestion = $interpatationQuestion;
        $this->interpatationValue = $interpatationValue;
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

    public function interpretation($data, $id)
    {
        DB::transaction(function () use ($data, $id) {
            $allIds = [];
            foreach ($data['question'] as $key => $que) {
                $Iid = (isset($data['id'][$key]) ? $data['id'][$key] : '');
                if (!empty($Iid)) {
                    $int = $this->interpatation->find($Iid);
                } else {
                    $int = new $this->interpatation;
                }
                $int->scale_id = $id;
                $int->set_no = 0;
                $int->start = 0;
                $int->end = 0;
                $int->save();
                $allIds[] = $int->id;
                
                $allQuestion = [];
                foreach ($que as $question_id) {
                    $question = $this->interpatationQuestion->firstorcreate([ 'scale_interpreatation_id' => $int->id, 'question_id' => $question_id ]);
                    $allQuestion[] = $question->id;
                }

                $this->interpatationQuestion->where('scale_interpreatation_id', $int->id)->whereNotIn('id', $allQuestion)->delete();

                $allInterpretations = [];
                foreach ($data['min'][$key] as $k1 => $value) {
                    $inter_id = (isset($data['interpretation_id'][$key][$k1]) ? $data['interpretation_id'][$key][$k1] : '');
                    if (!empty($inter_id)) {
                        $inter = $this->interpatationValue->find($inter_id);
                    } else {
                        $inter = new $this->interpatationValue;
                    }

                    $inter->scale_interpreatation_id = $int->id;
                    $inter->min = $value;
                    $inter->max = $data['max'][$key][$k1];
                    $inter->interpretation = $data['value'][$key][$k1];
                    $inter->save();
                    $allInterpretations[] = $inter->id;
                }

                $this->interpatationValue->where('scale_interpreatation_id', $int->id)->whereNotIn('id', $allInterpretations)->delete();
            }

            $delete_data = $this->interpatation->where('scale_id', $id)->whereNotIn('id', $allIds)->get();
            foreach ($delete_data as $del_data) {
                $del_data->questions()->delete();
                $del_data->interpretations()->delete();
                $del_data->delete();
            }

        });

        return true;
    }
}