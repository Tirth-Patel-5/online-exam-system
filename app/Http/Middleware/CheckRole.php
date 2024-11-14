<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role)
    {

        $roles = ['admin', 'teacher', 'student'];

        if (!Auth::user() || !Auth::user()->hasRole($role)) {
            // Redirect or return error
            return redirect('/'); // Or another response
        }
        return $next($request);
    }
}