<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check() && auth()->user()->role == 'admin'){
            return $next($request);
        }
        return redirect()->route('litindex')->with('error', 'You do not have admin access!');
    }
}
