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
        return view('admin.support.index', [ 'supports' => $this->support->all() ]);
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
}
