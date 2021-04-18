<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\SelfiProgram;
use App\SelfiProgramOption;
use App\SelfiInterpretation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SelfiController extends Controller
{
    public function index()
    {
        return view('admin.selfi_program', [ 'questions' => SelfiProgram::all() ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'question.*' => 'required',
            'option.*.*' => 'required',
            'answer_value.*.*' => 'required|integer'
        ]);


        DB::transaction(function () use ($request) {
            $allQuestion = [];
            foreach ($request->question as $key => $value) {
                $program = new SelfiProgram;
                if (isset($request->question_id[$key]) && !empty($request->question_id[$key])) {
                    $program = SelfiProgram::find($request->question_id[$key]);
                }

                $program->question = $value;
                $program->save();
                $allQuestion[] = $program->id;
                
                $optionsId = [];
                foreach ($request->option[$key] as $key1 => $value1) {

                    if (isset($request->answer_id[$key]) && isset($request->answer_id[$key][$key1]) && !empty($request->answer_id[$key][$key1])) {
                        $opt = SelfiProgramOption::find($request->answer_id[$key][$key1]);
                    } else {
                        $opt = new SelfiProgramOption;
                        $opt->selfi_program_id = $program->id;
                    }

                    $opt->option = $value1;
                    $opt->value = $request->answer_value[$key][$key1];
                    $opt->save();
                    $optionsId[] = $opt->id;
                }

                SelfiProgramOption::where('selfi_program_id', $program->id)->whereNotIn('id', $optionsId)->delete();
            }

            $questions = SelfiProgram::whereNotIn('id', $allQuestion)->get();
            foreach ($questions as $question) {
                $question->options->delete();
                $question->delete();
            }

        });

        return redirect()->back();
    }

    public function interpretation()
    {
        return view('admin.selfi_interpretation', [ 'inters' => SelfiInterpretation::all() ]);
    }

    public function interpretationUpdate(Request $request)
    {
        $request->validate([
            'min.*' => 'required|integer',
            'max.*' => 'required|integer',
            'interpretation.*' => 'required'
        ]);

        $all = [];
        foreach ($request->min as $key => $min) {
            $inter = new SelfiInterpretation;
            if (isset($request->id[$key]) && !empty($request->id[$key])) {
                $inter = SelfiInterpretation::find($request->id[$key]);
            }
            $inter->min = $min;
            $inter->max = $request->max[$key];
            $inter->interpretation = $request->interpretation[$key];
            $inter->save();
            $all[] = $inter->id;
        }

        SelfiInterpretation::whereNotIn('id', $all)->delete();

        return redirect()->back();
    }
}
