<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AvailableBook
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
        if($request->path() == '/library/show/books'){
            return $next($request);
        }
        
    }
}
