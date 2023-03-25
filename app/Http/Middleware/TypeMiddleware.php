<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $type)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        //        $user = Auth::user();
        //        if ($user['type'] == $type) {
        //            return $next($request);
        //        }

        $allowedTypes = array_slice(func_get_args(), 2);
        if (in_array(Auth::user()['type'], $allowedTypes)) {
            return $next($request);
        }

        return redirect()->route('login');
    }
}
