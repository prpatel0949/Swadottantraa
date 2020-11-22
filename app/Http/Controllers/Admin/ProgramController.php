<?php

namespace App\Http\Controllers\Admin;

use Hash;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Program\AddRequest;
use App\Http\Requests\Admin\Program\UpdateRequest;
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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            // 'time' => 'required|numeric',
            'cost' => 'required|numeric',
            'tag' => 'required|string',
            'image' => 'required|mimes:jpeg,jpg,png',
            'stage_name.*' => 'required|string|max:100', 
            'stage_description.*' => 'required|string',
            'attachment.*.*.*' => 'nullable|mimes:jpeg,jpg,png,pdf,mp4,avi',
            'step_name.*.*' => 'required|string|max:100',
            'step_description.*.*' => 'required|string',
            'comment.*.*' => 'nullable|string|max:200',
        ], [
            'stage_name.*.required' => 'Stage name is required.',
            'stage_description.*.required' => 'Stage description is required.',
            'step_name.*.*.required' => 'Step Name is required.',
            'step_description.*.*.required' => 'Step description is required.',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

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
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            // 'time' => 'required|numeric',
            'cost' => 'required|numeric',
            'tag' => 'required|string',
            'image' => 'nullable|mimes:jpeg,jpg,png',
            'stage_name.*' => 'required|string|max:100', 
            'stage_description.*' => 'required|string',
            // 'attachment.*.*.*' => 'nullable|mimes:jpeg,jpg,png,pdf,mp4,avi',
            'step_name.*.*' => 'required|string|max:100',
            'step_description.*.*' => 'required|string',
            'comment.*.*' => 'nullable|string|max:200',
        ], [
            'stage_name.*.required' => 'Stage name is required.',
            'stage_description.*.required' => 'Stage description is required.',
            'step_name.*.*.required' => 'Step Name is required.',
            'step_description.*.*.required' => 'Step description is required.',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if ($this->program->update($request->all(), $id)) {
            return redirect()->route('program.index')->with('success', 'Program updated successfully.');
        }

        return redirect()->route('program.index')->with('error', 'Something went wrong happen!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->program->destroy($id)) {
            return response()->json([ 'success' => 'success' ], 200);
        }

        return response()->json([ 'error' => 'error' ], 500);
    }

    public function updateStatus($id)
    {
        if ($this->program->updateStatus($id)) {
            return redirect()->route('program.index')->with('success', 'Status updated successfully.');
        }

        return redirect()->route('program.index')->with('error', 'Something went wrong happen.');
    }

    public function answers()
    {
        return view('admin.program.user_answer', [ 'answers' => $this->program->answers() ]);
    }

    public function answerDetail($id)
    {
        return view('admin.program.user_answer_detail', [ 'answers' => $this->program->answer($id) ]);
    }

    public function getAccessStages($id, Request $request)
    {
        return view('admin.program.stages', [ 
            'program' => $this->program->find($id),
            'access' => $this->program->getAccess($id, $request->user_id)->pluck('stage_id')->toArray(),
        ]);
    }

    public function stageAccess(Request $request, $id)
    {
        if ($this->program->stageAccess($request->all(), $id)) {
            return response()->json([ 'success' => 'success' ], 200);
        }

        return response()->json([ 'error' => 'error' ], 500);
    }
}
