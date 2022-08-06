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
    public function handle(Request $request, Closure $next, $role)
    {
        $user = $request->user()->load('roles');
        if ($user->roles->name !== $role) {
            return Json::exception("Anda Tidak memiliki Akses");
        }
        // $next($request);

        return $next($request);
    }
}
