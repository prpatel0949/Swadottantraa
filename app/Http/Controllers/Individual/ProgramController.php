<?php

namespace App\Http\Controllers\Individual;

use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Interfaces\ProgramRepositoryInterface;

class ProgramController extends Controller
{
    private $program;

    public function __construct(ProgramRepositoryInterface $program)
    {
        $this->program = $program;
    }

    public function index()
    {
        return view('individual.program', [ 'programs' => $this->program->all() ]);
    }

    public function hash(Request $request)
    {
        // key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5||||||salt;
        return hash('sha512', config("payu.merchant_key").'|'.$request->timestamp.'|'.$request->program['amount'].'|'.$request->program['prog_name'].'|'.Auth::user()->name.'|'.Auth::user()->email.'|||||1||||||'.config("payu.merchant_salt"));
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

        if (!$program->is_subcribe) {
            return redirect()->back();
        }

        return view('individual.program_question', [ 'program' => $program ]);
    }

    public function questionAnswer(Request $request, $id)
    {
        foreach($request->get('question') as $a => $z)
        {
            $rules['answer.'.$z] = 'required';
        }

        $request->validate($rules, [ 'answer.*.required' => 'Answer is required.' ]);

        if ($this->program->storeAnswer($request->all(), $id)) {
            return redirect()->route('individual.program.access', ['id' => $id]);
        }

        return redirect()->route('individual.program.access', ['id' => $id ]);

    }
}
