<?php

namespace App\Http\Middleware;

use App\Models\GuardianApproval;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ageLimitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()) {
            $temp = GuardianApproval::where('player_id',Auth::user()->id)->first();
            if($temp->id){
            if (Auth::user()->status == 'approved') {




                return $next($request);
            } else {
                return redirect()->route('backend.underage');
            }
            }else{
                return $next($request);
            }
        }else{
            return $next($request);
        }
    }

}
