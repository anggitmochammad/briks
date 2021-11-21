<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleManSup
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
        if (Auth::user()->id_role != 1 && Auth::user()->id_role != 3 && Auth::user()->id_role != 4) {
            Auth::logout();
            return redirect('/')->with('danger','Harap login terlebih dahulu');
        }
        return $next($request);
    }
}
