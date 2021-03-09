<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use App\Client;
use Carbon\Carbon;

class CheckClientActivity
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
        $client = Client::find(Auth::user()->id);
        if ($client) {
            $client->last_login = Carbon::now()->format('Y-m-d H:i:s');
            $client->save();
        }
        return $next($request);
    }
}
