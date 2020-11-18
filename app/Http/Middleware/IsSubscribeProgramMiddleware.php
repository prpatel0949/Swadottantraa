<?php

namespace App\Http\Middleware;

use Closure;
use App\Program;

class IsSubscribeProgramMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $program = Program::active()->find($request->id);
        if (!$program->is_subcribe) {
            abort(403);
        }
        return $next($request);
    }
}
