<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        // セッションを保持していない場合はadmin.loginへ
        if (!session()->has('admin_id')) {
            return redirect()->route('admin.login');
        }

        return $next($request);
    }
}
