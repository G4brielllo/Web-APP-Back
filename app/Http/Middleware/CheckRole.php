<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            Log::info('User is not logged in.');
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $user = Auth::user();
        Log::info('User is logged in: ' . $user->id);
        foreach ($roles as $role) {
            Log::info('Checking role: ' . $role);
            if ($user->role === $role) {
                return $next($request);
            }
        }
        Log::info('User role does not match any required roles.');
        return response()->json(['error' => 'Forbidden'], 403);
    }

}