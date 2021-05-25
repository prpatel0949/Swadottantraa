<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $type = (request()->segment(3) != '' && request()->segment(3) == 'medical' ? 1 : 0);
        return view('admin.support.index', [ 'supports' => $this->support->all([ 'type' => $type ]) ]);
    }

    public function edit($id)
    {
        return view('admin.support.edit', [ 'support' => $this->support->find($id) ]);
    }

    public function update(Request $request, $id)
    {
        if ($this->support->update($request->all(), $id)) {
            return redirect()->route('admin.support.index')->with('success', 'Updated successfully.');
        }

        return redirect()->route('admin.support.index')->with('success', 'Something went wrong happen!');
    }

    public function addToFAQ($id)
    {
        if ($this->support->addToFAQ($id)) {
            return redirect()->back()->with('success', 'Addred To successfully.');
        }

        return redirect()->back()->with('success', 'Something went wrong happen!');
    }

    public function destroy($id)
    {
        if ($this->support->destroy($id)) {
            return response()->json([ 'success' => 'success' ], 200);
        }

        return response()->json([ 'error' => 'error' ], 500);
    }
}
