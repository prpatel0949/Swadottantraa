<?php

namespace App\Http\Controllers\Individual;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddTicketRequest;
use App\Repository\Interfaces\FAQRepositoryInterface;
use App\Repository\Interfaces\SupportRepositoryInterface;

class SupportController extends Controller
{
    private $support, $faq;

    public function __construct(SupportRepositoryInterface $support, FAQRepositoryInterface $faq)
    {
        $this->support = $support;
        $this->faq = $faq;
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

    public function faqs($type = '')
    {
        return view('individual.faq', [ 'faqs' => $this->faq->getAll($type) ]);
    }
}
