<?php

namespace App\Http\Middleware;

use Closure;

class AllowBookableSched
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


        $admin_roles = auth('admin')->user()->tags()->pluck('name')->toArray(); //get the staff roles

        if( !in_array('bookable_schedule',$admin_roles) ){
            return redirect()->route('admin.not_authorized');
        }

        return $next($request);


        
    }
}
