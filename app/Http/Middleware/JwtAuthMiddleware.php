<?php

namespace App\Http\Middleware;

use Closure;

use App\User;

class JwtAuthMiddleware
{
    public function handle($request, Closure $next)
    {
        $id = $request->user_id;
        $user = User::find($id);
        if (! $user) {
            return response()->json(['errors' => 'Token not found'], 404);
        }
        $request->user = $user;
        return $next($request);
    }
}
