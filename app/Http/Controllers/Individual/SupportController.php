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
        return view('individual.support', [ 'supports' => $this->support->all([ 'user_id' => Auth::user()->id ]) ]);
    }

    public function store(AddTicketRequest $request)
    {
        if ($this->support->store($request->validated())) {
            return redirect()->route('support.index')->with('success', 'We have received your enquiry and will respond to you sortly.');
        }

        return redirect()->route('support.index')->with('error', 'Something went wrong happen!');
    }
}
