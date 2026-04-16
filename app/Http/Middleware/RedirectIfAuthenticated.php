<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     * If an admin visits /login, redirect them to the admin dashboard.
     * If a regular user visits /login, redirect them to the homepage.
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user = Auth::guard($guard)->user();

                if ($user && $user->is_admin) {
                    return redirect()->route('admin.dashboard');
                }

                return redirect('/');
            }
        }

        return $next($request);
    }
}
