<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BackAllowed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        return $response->header('Cache-Control' , 'no-cache , no-store , max-age=0 , must-revalidate')
                        ->header('Pragma' , 'no-cache')
                        ->header('Expires' , 'Sun , 02 Jan 1990 00:00:00 GMT');
    }
}
