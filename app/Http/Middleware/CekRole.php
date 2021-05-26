<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,...$roles)
    {
        // if(in_array($request->session()->get('akses_role'), $roles)) {
        //     return $next($request);
        // }
        // return redirect('login');

        if(in_array(Auth::user()->role->role, $roles)) {
            return $next($request);
        }
        return redirect('login');
        
    }
}
