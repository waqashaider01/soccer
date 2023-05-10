<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\GuardianApproval;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        $approveStatus = GuardianApproval::where('player_id', Auth()->id())->pluck('status')->first();
        $status = Auth()->user()->status;

        $type = Auth()->user()->type;
        switch ($type) {
            case 'admin':
                return route('admin.dashboard');
                break;
            case 'player':
                // dd("hello");
                if ($approveStatus == 'approved' && $status == 'active') {
                    // dd("approved");
                    return redirect()->route('player.dashboard');
                } elseif ($approveStatus == 'disapproved' || $status == 'blocked') {
                    Auth::logout();
                    session()->flash('error', 'Your account is blocked, please contact admin');
                    return route('login');
                } elseif ($approveStatus == 'waiting' || $status == 'waiting') {
                    // dd("waiting");
                    session()->flash('error', 'Please Upload Your Documents!!!');
                    return url('backend.underage');
                } else {
                    return route('player.dashboard');
                }
                break;
            case 'scout':
                switch ($status) {
                    case 'active':
                        return route('scout.dashboard');
                        break;
                    case 'blocked':
                        Auth::logout();
                        session()->flash('error', 'Your account is blocked, please contact admin');
                        return route('login');
                        break;
                    default:
                        return route('scout.dashboard');
                        break;
                }
                break;
            case 'club':
                switch ($status) {
                    case 'active':
                        return route('club.dashboard');
                        break;
                    case 'blocked':
                        Auth::logout();
                        session()->flash('error', 'Your account is blocked, please contact admin');
                        return route('login');
                        break;
                    default:
                        return route('club.dashboard');;
                }
                break;
            case 'coach':
                switch ($status) {
                    case 'active':
                        return route('coach.dashboard');
                        break;
                    case 'blocked':
                        Auth::logout();
                        session()->flash('error', 'Your account is blocked, please contact admin');
                        return route('login');
                        break;
                    default:
                        return route('coach.dashboard');
                }
                break;
            case 'intermediary':
                switch ($status) {
                    case 'active':
                        return route('intermediary.dashboard');
                        break;
                    case 'blocked':
                        Auth::logout();
                        session()->flash('error', 'Your account is blocked, please contact admin');
                        return route('login');
                        break;
                    default:
                        return route('intermediary.dashboard');
                }
                break;
            case 'academy':
                switch ($status) {
                    case 'active':
                        return route('academy.dashboard');
                        break;
                    case 'blocked':
                        Auth::logout();
                        session()->flash('error', 'Your account is blocked, please contact admin');
                        return route('login');
                        break;
                    default:
                        return route('academy.dashboard');
                }
                break;
            default:
                return route('login');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Google Login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
    // Google Callback
    public function handleGoogleCallback()
    {
        // $user = Socialite::driver('google')->user();
        $user = Socialite::driver('google')->stateless()->user();

        $this->_registerOrLoginUser($user);
        // return home after login
        return redirect()->to('home');
    }

    // Facebook Login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    // Facebook Callback
    public function handleFacebookCallback()
    {
        // $user = Socialite::driver('facebook')->user();
        $user = Socialite::driver('facebook')->stateless()->user();

        $this->_registerOrLoginUser($user);
        // return home after login
        return redirect()->to('home');
    }

    // Github Login
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }
    // Github Callback
    public function handleGithubCallback()
    {
        // $user = Socialite::driver('github')->user();
        $user = Socialite::driver('github')->stateless()->user();

        $this->_registerOrLoginUser($user);
        // return home after login
        return redirect()->to('home');
    }

    // Linkedin Login
    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin')->redirect();
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    // Linkedin Callback
    public function handleLinkedinCallback()
    {
        // $user = Socialite::driver('linkedin')->user();
        $user = Socialite::driver('linkedin')->stateless()->user();

        $this->_registerOrLoginUser($user);
        // return home after login
        return redirect()->to('home');
    }

    protected function _registerOrLoginUser($data)
    {
        $user = User::where('email', '=', $data->email)->first();
        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->google_id = $data->id;
            $user->save();
        }
        Auth::login($user);
    }
}
