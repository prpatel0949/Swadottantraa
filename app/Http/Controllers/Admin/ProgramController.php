<?php

namespace App\Http\Controllers\Admin;

use Hash;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Program\AddRequest;
use App\Http\Requests\Admin\Program\UpdateRequest;
use App\Repository\Interfaces\UserRepositoryInterface;
use App\Repository\Interfaces\ScaleRepositoryInterface;
use App\Repository\Interfaces\ProgramRepositoryInterface;
use App\Repository\Interfaces\WorkoutRepositoryInterface;

class ProgramController extends Controller
{
    private $scale, $workout, $program, $user;

    public function __construct(
        ScaleRepositoryInterface $scale,
        WorkoutRepositoryInterface $workout,
        ProgramRepositoryInterface $program,
        UserRepositoryInterface $user
    )
    {
        $this->scale = $scale;
        $this->workout = $workout;
        $this->program = $program;
        $this->user = $user;
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
            'tag' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif',
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
            'tag' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,png,gif',
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
            return response()->json([ 'success' => 'Status updated successfully.' ], 200);
            // return redirect()->route('program.index')->with('success', 'Status updated successfully.');
        }

        return response()->json([ 'error' => 'Something went wrong happen.' ], 500);
        // return redirect()->route('program.index')->with('error', 'Something went wrong happen.');
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

    public function copy($id)
    {
        $program = $this->program->copy($id);
        return redirect()->route('program.edit', ['program' => $program->id ]);
    }

    public function answerComment(Request $request, $id)
    {
        if ($this->program->answerComment($request->all(), $id)) {
            return redirect()->back()->with('success', 'Comment added Successfully.');
        }

        return redirect()->back()->with('error', 'Something went wrong happen.');
    }

    public function recommandProgram()
    {
        return view('admin.program.recommand.index', [ 'programs' => $this->program->allRecommandedProgram() ]);
    }

    public function createRecommandProgram()
    {
        return view('admin.program.recommand.add', [
            'users' => $this->user->all([ 'type' => 0 ]),
            'programs' => $this->program->all(),
        ]);
    }

    public function storeRecommandProgram(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'program_id' => 'required|array'
        ]);
        
        $this->program->recommandProgram($request->all());

        return redirect()->route('recommand.program')->with('success', 'Program recommanded Successfully.');
    }

    public function editRecommandProgram($id)
    {
        return view('admin.program.recommand.edit', [
            'users' => $this->user->all([ 'type' => 0 ]),
            'programs' => $this->program->all(),
            'recommanded_programs' => $this->program->findRecommandProgram($id),
        ]);
    }

    public function updateRecommandProgram(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'program_id' => 'required|array'
        ]);
        
        $this->program->updateRecommandProgram($request->all(), $id);

        return redirect()->route('recommand.program')->with('success', 'Program recommanded updated Successfully.');
    }
}
