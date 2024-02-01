<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserDataMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        $name_parts = explode(' ', $user->name);
        $short_name = $name_parts[1] . ' ' . end($name_parts);
        $role = $user->hasRole->name;

        view()->share('short_name', $short_name);
        view()->share('role', $role);

        return $next($request);
    }
}
