<?php

namespace App\Http\Controllers\Admin;

use Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Program\AddRequest;
use App\Repository\Interfaces\ScaleRepositoryInterface;
use App\Repository\Interfaces\ProgramRepositoryInterface;
use App\Repository\Interfaces\WorkoutRepositoryInterface;

class ProgramController extends Controller
{
    private $scale, $workout, $program;

    public function __construct(
        ScaleRepositoryInterface $scale,
        WorkoutRepositoryInterface $workout,
        ProgramRepositoryInterface $program
    )
    {
        $this->scale = $scale;
        $this->workout = $workout;
        $this->program = $program;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.program.index', [ 'programs' => $this->program->all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $page = '';
        if (Hash::check(0, $request->type)) {
            $page = 'admin.program.add';
        } else if (Hash::check(1, $request->type)) {
            $page = 'admin.program.add_guided';
        } else {
            abort(404);
        }
        return view($page,  [
            'scales' => $this->scale->all(),
            'workouts' => $this->workout->all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        if ($this->program->store($request->all())) {
            return redirect()->route('program.index')->with('success', 'Program created successfully.');
        }

        return redirect()->route('program.index')->with('error', 'Something went wrong happen!');
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
        $program = $this->program->find($id);
        if ($program->type == 0) {
            $page = 'admin.program.edit';
        } else {
            $page = 'admin.program.edit_guided';
        }
        return view($page,  [
            'scales' => $this->scale->all(),
            'workouts' => $this->workout->all(),
            'program' => $program
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
