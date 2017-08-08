<?php

namespace App\Http\Middleware;

use Closure;

Use App\UserAddress;
Use App\UserPicture;

class OwnerMiddleware
{
    public function handle($request, Closure $next, $resource)
    {
        $user = $request->jwtUser;
        if ($resource === 'user') {
            if ($user->id !== $request->id) {
                return response()->json(['errors' => 'Unauthorized'], 403);
            }
        } else if ($resource === 'address') {
            $address = UserAddress::find($request->id)->first();
            if ($address->user_id !== $user->id) {
                return response()->json(['errors' => 'Unauthorized'], 403);
            }
        } else if ($resource === 'picture') {
            $picture = UserPicture::find($request->id)->first();
            if ($picture->user_id !== $user->id) {
                return response()->json(['errors' => 'Unauthorized'], 403);
            }
        }
        return $next($request);
    }
}
