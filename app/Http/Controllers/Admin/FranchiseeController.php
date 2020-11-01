<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Franchisee\AddRequest;
use App\Http\Requests\Admin\Franchisee\UpdateRequest;
use App\Repository\Interfaces\UserRepositoryInterface;

class FranchiseeController extends Controller
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
        return view('admin.franchisee.index', [ 'users' => $this->user->all([ 'type' => 2 ]) ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.franchisee.add');
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
        $data['type'] = 2;
        do {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $code = '';
            for ($i = 0; $i < 6; $i++) {
                $code .= $characters[rand(0, $charactersLength - 1)];
            }
            $user_code = $this->user->all([ 'franchisee_code' => $code ]);
        } while(empty($user_code));

        $data['franchisee_code'] = $code;;

        if ($this->user->store($data)) {
            return redirect()->route('franchisee.index')->with('success', 'Franchisee created successfully.');
        }

        return redirect()->route('franchisee.index')->with('error', 'Something went wrong happen!');
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
        return view('admin.franchisee.edit', [ 'user' => $this->user->find($id) ]);
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
            return redirect()->route('franchisee.index')->with('success', 'Franchisee updated successfully.');
        }

        return redirect()->route('franchisee.index')->with('error', 'Something went wrong happen!');
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

    public function users($id)
    {
        // return view('admin.franchisee.users', [ 'franchisee' => $this->user->find($id) ]);
    }
}
