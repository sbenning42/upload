<?php

namespace App\Http\Middleware;

use Closure;

use App\User;
use JWTAuth;

class JwtAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = JWTAuth::toUser(JWTAuth::getToken());
        if (! $user) {
            return response()->json(['errors' => 'Token not found'], 404);
        }
        $request->jwtUser = $user;
        return $next($request);
    }
}
