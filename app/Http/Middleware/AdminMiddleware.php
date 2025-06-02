<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $allowedAdmins = [
            'anisa@admin.com' //PW: admin123
        ];

        if (!Auth::check() || !in_array(Auth::user()->email, $allowedAdmins)) {
            return redirect('/login')->with('error', 'Anda tidak memiliki akses.');
        }

        return $next($request);
    }
}
