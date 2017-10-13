<?php

namespace App\Http\Middleware;

class Act
{
    public function handle($request, \Closure $next)
    {
        if(time() < strtotime('2017-10-12'))
        {
            return redirect('act0');
        }
        return $next($request);
    }
}