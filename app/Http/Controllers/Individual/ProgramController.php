<?php

namespace App\Http\Controllers\Individual;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Interfaces\CouponRepositoryInterface;
use App\Repository\Interfaces\ProgramRepositoryInterface;

class ProgramController extends Controller
{
    private $program, $coupon;

    public function __construct(ProgramRepositoryInterface $program, CouponRepositoryInterface $coupon)
    {
        $this->program = $program;
        $this->coupon = $coupon;
    }

    public function index()
    {
        $programs = $this->program->active();
        $tags = explode(',', Auth::user()->tags);
        $programs = $programs->filter(function($value, $key) use ($tags) {
            $program_tag = explode(',', $value->tag);
            $return = false;
            foreach ($tags as $tag) {
                if (in_array($tag, $program_tag)) {
                    $return = true;
                }
            }
            return $return;
        })->values();
        return view('individual.program', [ 'programs' => $programs ]);
    }

    public function hash(Request $request)
    {
        return hash('sha512', config("payu.merchant_key").'|'.$request->timestamp.'|'.$request->cost.'|'.$request->program['title'].'|'.Auth::user()->name.'|'.Auth::user()->email.'|||||1||||||'.config("payu.merchant_salt"));
    }

    public function paymentResponse(Request $request)
    {
        if ($request->status == 'success') {
            $this->program->subscribe($request);
            return redirect()->route('individual.program')->with('success', 'Program subcribe successfully.');
        }

        return redirect()->back()->with('error', 'Payment fail try after sometime.');
    }

    public function accessProgram($id)
    {
        $program = $this->program->findorfail($id);
        return view('individual.program_detail', [ 
            'program' => $program,
            'access' => $this->program->getAccess($id, Auth::user()->id)->pluck('stage_id')->toArray()
        ]);
    }

    public function accessProgramStage($id, $stage_id)
    {
        $program = $this->program->findorfail($id);

        $first_stage = $program->stages->first()->id;

        $stage = $program->stages->where('id', $stage_id)->first();
        if (empty($stage)) {
            abort(404);
        }

        $access = $this->program->getAccess($id, Auth::user()->id)->pluck('stage_id')->toArray();
        if ($program->type == 1 && $first_stage != $stage->id && !in_array($stage->id, $access)) {
            abort(403);
        }

        return view('individual.program_stage', [
            'program' => $program,
            'steps' => $stage->steps
        ]);
    }

    public function accessProgramStep($id, $stage_id, $step_id)
    {
        $program = $this->program->findorfail($id);
        $first_stage = $program->stages->first()->id;

        $stage = $program->stages->where('id', $stage_id)->first();
        if (empty($stage)) {
            abort(404);
        }

        $access = $this->program->getAccess($id, Auth::user()->id)->pluck('stage_id')->toArray();
        if ($program->type == 1 && $first_stage != $stage->id && !in_array($stage->id, $access)) {
            abort(403);
        }

        $step = $stage->steps->where('id', $step_id)->first();
        if (empty($step)) {
            abort(404);
        }

        // echo $this->program->usersAnswers($step->id, Auth::user()->id); die;

        return view('individual.program_step', [
            'program' => $program,
            'steps' => $stage->steps,
            'current_step' => $step,
            'answers' =>  $this->program->usersAnswers($step->id, Auth::user()->id)
        ]);
    }

    // public function questionAnswer(Request $request, $id)
    // {
    //     foreach($request->get('question') as $a => $z)
    //     {
    //         $rules['answer.'.$z] = 'required';
    //     }

    //     $request->validate($rules, [ 'answer.*.required' => 'Answer is required.' ]);

    //     if ($this->program->storeAnswer($request->all(), $id)) {
    //         return redirect()->route('individual.program.access', ['id' => $id]);
    //     }

    //     return redirect()->route('individual.program.access', ['id' => $id ]);
    // }

    public function scaleQuestionAnswer(Request $request, $id)
    {
        if ($this->program->scaleQuestionAnswer($request->all(), $id)) {
            return redirect()->back()->with('success', 'Answer submited successfully.');
        }

        return redirect()->back()->with('error', 'Something went wrong happen.');
    }

    public function applyCode(Request $request)
    {
        $request->validate([
            'code' => 'required|exists:coupons,code'
        ], [
            'code.exists' => 'Coupon code is invalid.'
        ]);

        if ($code = $this->coupon->applyCode($request->all())) {
            if ($code == -1) {
                return response()->json([ 'message' => 'Coupon code already used.' ], 500);
            }
            
            return response()->json([ 'message' => 'Coupon code apply successfully.', 'code' => $code ], 200);
        }

        return response()->json([ 'message' => 'Coupon code expired.' ], 500);

    }
}
