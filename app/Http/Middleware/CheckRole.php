<?php
namespace App\Http\Middleware;
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, $role, $permission = null)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login'); // Redirect if not authenticated
        }

        if (!$user->hasRole($role)) {
            abort(403, 'Unauthorized access. No valid role assigned.');
        }

        if ($permission && !$user->can($permission)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}