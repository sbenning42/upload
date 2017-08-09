<?php

namespace App\Http\Middleware;

use Closure;

use App\UserRole;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $roleName)
    {
        $user = $request->user;
        $role = UserRole::where('name', $roleName)->get()->first();
        if ($user->role_id !== $role->id) {
            return response()->json(['errors' => 'Unauthorized'], 403);
        }
        return $next($request);
    }
}
