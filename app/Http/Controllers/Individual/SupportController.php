<?php

namespace App\Http\Controllers\Individual;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddTicketRequest;
use App\Repository\Interfaces\SupportRepositoryInterface;

class SupportController extends Controller
{
    private $support;

    public function __construct(SupportRepositoryInterface $support)
    {
        $this->support = $support;
    }

    public function index()
    {
        $type = (request()->segment(3) == 'technical' ? 0 : 1);
        return view('individual.support', [ 'supports' => $this->support->all([ 'user_id' => Auth::user()->id, 'type' => $type ]) ]);
    }

    public function store(AddTicketRequest $request)
    {
        $data = $request->validated();
        $data['type'] = (isset($request->type) ? $request->type : 0);
        if ($this->support->store($data)) {
            return redirect()->back()->with('success', 'We have received your enquiry and will respond to you sortly.');
        }

        return redirect()->back()->with('error', 'Something went wrong happen!');
        // return redirect()->route('support.index')->with('error', 'Something went wrong happen!');
    }
}
