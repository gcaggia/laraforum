<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ProfileOwner
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
        //dd($request);
        $user = $request->route()->parameter('username');

        if($user->isProfileOwner())
            return $next($request);
        else
            return redirect('/user/' . $user->username);
    }
}
