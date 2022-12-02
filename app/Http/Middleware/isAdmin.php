<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect('login');
        }
        $User=Auth::user();
        if(auth() ->user()->roles_id == 1){
            return $next($request);
        }
        return redirect('home')->with('error','anda tidak memiliki akses sebagai admin');
    }
}