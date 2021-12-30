<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LoginAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = \Session::get('user');
        if($user->role != 'admin'){
            \Session::flash('log', 'Silahkan Login Terlebih Dahulu');
            \Session::flush();
            return redirect('/');
        }
        return $next($request);
    }
}
