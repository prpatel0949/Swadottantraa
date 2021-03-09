<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Institue\AddRequest;
use App\Http\Requests\Admin\Institue\UpdateRequest;
use App\Repository\Interfaces\UserRepositoryInterface;

class InstitueController extends Controller
{
    private $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.institue.index', [ 'users' => $this->user->all([ 'type' => 1 ]) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.institue.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddRequest $request)
    {
        $data = $request->validated();
        $data['type'] = 1;
        do {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $code = '';
            for ($i = 0; $i < 6; $i++) {
                $code .= $characters[rand(0, $charactersLength - 1)];
            }
            $user_code = $this->user->all([ 'code' => $code ]);
        } while(empty($user_code));

        $data['code'] = $code;

        if ($this->user->store($data)) {
            return redirect()->route('institue.index')->with('success', 'Institue created successfully.');
        }
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
        return view('admin.institue.edit', [ 'user' => $this->user->find($id) ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        if ($this->user->update($request->validated(), $id)) {
            return redirect()->route('institue.index')->with('success', 'Institue updated successfully.');
        }

        return redirect()->route('institue.index')->with('error', 'Something went wrong happen!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->user->destroy($id)) {
            return response()->json([ 'message' => 'success' ], 200);
        }

        return response()->json([ 'message' => 'error' ], 500);
    }
}
