<?php

namespace App\Http\Middleware;

use Closure;

class CheckAuthenticated
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
        if (!session('idAdminAktif')) {
            return redirect("/admin/login");
        } else {
            return $next($request);
        }
    }
}
