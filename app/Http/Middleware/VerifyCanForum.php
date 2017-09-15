<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use User;

class VerifyCanForum
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
        if (isset(Auth::user()->access_forum) && (Auth::user()->access_forum)) {
            return $next($request);
        }
        return redirect('forum/accessDenied');
    }
}
