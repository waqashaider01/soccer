<?php

namespace App\Http\Middleware;

use App\Models\GuardianApproval;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $approveStatus = GuardianApproval::where('player_id', Auth()->id())->pluck('status')->first();
            $status = Auth()->user()->status;
            $type = Auth::user()->type;

            switch ($type) {
                case 'admin':
                    return redirect()->route('admin.dashboard');
                    break;
                case 'player':
                    if ($approveStatus == 'approved' && $status == 'active') {
                        return redirect()->route('player.dashboard');
                    } elseif ($approveStatus == 'disapproved' || $status == 'blocked') {
                        Auth::logout();
                        session()->flash('error', 'Your account is blocked, please contact admin');
                        return redirect()->route('login');
                    } else {
                        return redirect()->route('player.dashboard');
                    }
                case 'scout':
                    switch ($status) {
                        case 'active':
                            return redirect()->route('scout.dashboard');
                            break;
                        case 'blocked':
                            Auth::logout();
                            session()->flash('error', 'Your account is blocked, please contact admin');
                            return redirect()->route('login');
                            break;
                        default:
                            return redirect()->route('scout.dashboard');
                            break;
                    }
                    break;
                case 'club':
                    switch ($status) {
                        case 'active':
                            return redirect()->route('club.dashboard');
                            break;
                        case 'blocked':
                            Auth::logout();
                            session()->flash('error', 'Your account is blocked, please contact admin');
                            return redirect()->route('login');
                            break;
                        default:
                            return redirect()->route('club.dashboard');
                            break;
                    }
                    break;
                case 'coach':
                    switch ($status) {
                        case 'active':
                            return redirect()->route('coach.dashboard');
                            break;
                        case 'blocked':
                            Auth::logout();
                            session()->flash('error', 'Your account is blocked, please contact admin');
                            return redirect()->route('login');
                            break;
                        default:
                            return redirect()->route('coach.dashboard');
                            break;
                    }
                    break;
                case 'intermediary':
                    switch ($status) {
                        case 'active':
                            return redirect()->route('intermediary.dashboard');
                            break;
                        case 'blocked':
                            Auth::logout();
                            session()->flash('error', 'Your account is blocked, please contact admin');
                            return redirect()->route('login');
                            break;
                        default:
                            return redirect()->route('intermediary.dashboard');
                            break;
                    }
                    break;
                case 'academy':
                    switch ($status) {
                        case 'active':
                            return redirect()->route('academy.dashboard');
                            break;
                        case 'blocked':
                            Auth::logout();
                            session()->flash('error', 'Your account is blocked, please contact admin');
                            return redirect()->route('login');
                            break;
                        default:
                            return redirect()->route('academy.dashboard');
                            break;
                    }
                    break;
                default:
                    return redirect()->route('home');
                    break;
            }
        }

        return $next($request);
    }
}
