<?php

namespace App\Http\Controllers\Franchisee;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repository\Interfaces\UserRepositoryInterface;
use App\Repository\Interfaces\ProgramRepositoryInterface;

class ProgramController extends Controller
{

    private $program, $user;

    public function __construct(
        ProgramRepositoryInterface $program,
        UserRepositoryInterface $user
    )
    {
        $this->program = $program;
        $this->user = $user;
    }

    public function recommandProgram()
    {
        return view('franchisee.program.recommand.index', [ 'programs' => $this->program->allRecommandedProgram() ]);
    }

    public function createRecommandProgram()
    {
        return view('franchisee.program.recommand.add', [
            'users' => $this->user->all([ 'type' => 0, 'franchisee_id' => Auth::user()->id ]),
            'programs' => $this->program->all(),
        ]);
    }

    public function storeRecommandProgram(Request $request)
    {
        $request->validate([
            'user_id.*' => 'required',
            'program_id' => 'required|array'
        ]);
        
        $this->program->recommandProgram($request->all());

        return redirect()->route('franchisee.recommand.program')->with('success', 'Program recommanded Successfully.');
    }

    public function editRecommandProgram($id)
    {
        return view('franchisee.program.recommand.edit', [
            'users' => $this->user->all([ 'type' => 0 ]),
            'programs' => $this->program->all(),
            'recommanded_programs' => $this->program->findRecommandProgram($id),
        ]);
    }

    public function updateRecommandProgram(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|array',
            'program_id' => 'required|array'
        ]);
        
        $this->program->updateRecommandProgram($request->all(), $id);

        return redirect()->route('franchisee.recommand.program')->with('success', 'Program recommanded updated Successfully.');
    }
}
