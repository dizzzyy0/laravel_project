<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Check_Name
{
    public function handle(Request $request, Closure $next)
    {
        if (!$request->name) {
            return redirect('/lab1');
        }
        return $next($request);
    }
}
