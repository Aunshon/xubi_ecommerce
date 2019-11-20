<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class UserApproval
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
        if (Auth::user()->approval == 2) {
            return $next($request);
        }
        elseif (Auth::user()->approval == 1) {
            return redirect(url('notApproved'));
        }
        else{
            return redirect(url('Banded'));
        }
    }
}
