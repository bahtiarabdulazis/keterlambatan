<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isUser
{
    public function handle(Request $request, Closure $next)
    {
        
        if(Auth::user()->role == 'ps') {
            return $next($request);
        } else {
            return redirect('/error.permission')->with('error', 'Unauthorized. Insufficient role.');
        }
    }
}
