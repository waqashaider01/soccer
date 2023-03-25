<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PayingCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (auth()->user()) {
            $plan = $request->user()->subscriptions->first() ? $request->user()->subscriptions->first()->name : null;
        } else {
            $plan = null;
        }

        if ($request->user() && $request->user()->subscribed($plan)) {
            return redirect()->route(auth()->user()->type . '.subscriptions');
        }

        return $next($request);
    }
}
