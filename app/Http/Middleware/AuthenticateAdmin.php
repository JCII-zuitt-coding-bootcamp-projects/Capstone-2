<?php

namespace App\Http\Middleware;

use Closure;

class AuthenticateAdmin
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

        // if a page has not auth biz, it will be redirected to admin login
        if ( auth('admin')->guest() ) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
