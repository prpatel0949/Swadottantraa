<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Scale\AddRequest;
use App\Repository\Interfaces\ScaleRepositoryInterface;

class ScaleController extends Controller
{

    private $scale;

    public function __construct(ScaleRepositoryInterface $scale)
    {
        $this->scale = $scale;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.scale.index', [ 'scales' => $this->scale->all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.scale.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        if ($this->scale->create($request->all())) {
            return redirect()->route('scale.index')->with('success', 'Scale created successfully.');
        }

        return redirect()->route('scale.index')->with('error', 'Something went wrong happen.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.scale.edit', [ 'scale' => $this->scale->findorfail($id) ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddRequest $request, $id)
    {
        if ($this->scale->update($request->all(), $id)) {
            return redirect()->route('scale.index')->with('success', 'Scale updated successfully.');
        }

        return redirect()->route('scale.index')->with('error', 'Something went wrong happen.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->scale->destroy($id)) {
            return response()->json([ 'success' => 'success' ], 200);
        }

        return response()->json([ 'error' => 'error' ], 500);
    }
}
