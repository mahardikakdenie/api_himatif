<?php

namespace App\Http\Middleware;

use Brryfrmnn\Transformers\Json;
use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $role_id)
    {
        $user = $request->user()->load('roles');
        if ($user->roles->id !== intval($role_id)) {
            return Json::exception("Anda Tidak memiliki Akses");
        }

        return $next($request);
    }
}
