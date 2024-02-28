<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Symfony\Component\HttpFoundation\Response;

class IsAuthenticated
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check())
        {
            $user = Auth::user();
            $name_parts = explode(' ', $user->name);
            
            if (Arr::get($name_parts, 1) !== null) {
                $short_name = $name_parts[1] . ' ' . end($name_parts);
            } else {
                $short_name = null;
            }

            $role = $user->hasRole->name;
            $file = $user->files; 

            view()->share('file', $file);
            view()->share('short_name', $short_name);
            view()->share('role', $role);

            return $next($request);
        }
        
        return redirect()->route('login');
    }
}