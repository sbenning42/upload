<?php

namespace App\Http\Middleware;

use Closure;

class OwnerMiddleware
{
    public function handle($request, Closure $next, $resource)
    {
        /*$user = $request->user;
        if ($resource === 'user') {
            if ($user->id !== $request->id) {
                return response()->json(['errors' => 'Unauthorized'], 403);
            }
        }*/
        return $next($request);
    }
}
