<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$role): Response
    {
    
        // Check If the User Role exist in Middleware Array $Roles
        if (in_array($request->user()->role->name,$role)) {
            // dump($request->user()->role->name , $role);
            return $next($request);
        }
        else {
            abort(403);
        }
       
    }
}
