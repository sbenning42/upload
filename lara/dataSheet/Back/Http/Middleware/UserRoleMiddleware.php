<?php

namespace App\Http\Middleware;

use \Illuminate\Http\Response;

use Closure;
use App\User;
use App\Role;
use App\UserRole;
use JWTAuth;

class UserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = JWTAuth::toUser(substr($request->header('Authorization'), 7));
        $role = Role::find(2);
        $user_role = UserRole::all()
            ->where('user_id', $user->id)
            ->where('role_id', $role->id);
        if ($user_role->isEmpty()) {
            return response()->json(['error' => 'Forbidden area [user]'], 403);
        }
        return $next($request);
    }
}
