<?php

namespace App\Http\Middleware;

use Closure;

class GroupMiddleware
{
    public function handle($request, Closure $next, $groupName)
    {
        $user = $request->user;
        if ($groupName === 'owner') {
            if ($user->id !== $request->id) {
                return response()->json(['errors' => 'Unauthorized'], 403);
            }
        }
        return $next($request);
    }
}
