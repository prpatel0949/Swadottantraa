<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Workout\AddRequest;
use App\Repository\Interfaces\WorkoutRepositoryInterface;

class WorkoutController extends Controller
{
    private $workout;

    public function __construct(WorkoutRepositoryInterface $workout)
    {
        $this->workout = $workout;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.workout.index', [ 'workouts' => $this->workout->all() ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.workout.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        if ($this->workout->create($request->all())) {
            return redirect()->route('workout.index')->with('success', 'Workout created successfully.');
        }

        return redirect()->route('workout.index')->with('error', 'Something went wrong happen.');
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
        return view('admin.workout.edit', [ 'workout' => $this->workout->find($id) ]);
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
        if ($this->workout->update($request->all(), $id)) {
            return redirect()->route('workout.index')->with('success', 'Workout updated successfully.');
        }

        return redirect()->route('workout.index')->with('error', 'Something went wrong happen.');
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
