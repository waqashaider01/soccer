<?php

namespace App\Http\Controllers\Network;

use App\Models\User;
use App\Models\Favourite;
use App\Models\Followers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invitation;
use Illuminate\Support\Facades\Auth;

class MyNetworkController extends Controller
{
    public function index()
    {
        $authUserId = Auth::id();
        $user_favourite = Favourite::where('user_id', $authUserId)->pluck('fav_id')->toArray();
        $followers = Followers::where('following', $authUserId)->pluck('follower')->toArray();
        $following = Followers::where('follower', $authUserId)->pluck('following')->toArray();
        $invitaion = Invitation::where('user_id', $authUserId)->pluck('email')->toArray();
        // dd($invitaion);
        $user_follower = [];
        $user_following = [];
        $user_favourites = [];

        //Favourites
        foreach ($user_favourite as $favourite) {
            $favourites = User::find($favourite);
            if ($favourites) {
                $user_favourites[] = $favourites;
            }
        }

        // User following here the scenary is a little bit change
        foreach ($followers as $follower) {
            $user = User::find($follower);
            if ($user) {
                $user_follower[] = $user;
            }
        }

        // User follower
        foreach ($following as $follow) {
            $user = User::find($follow);
            if ($user) {
                $user_following[] = $user;
            }
        }

        return view('backend.player.my-network', compact('invitaion', 'user_follower', 'user_following', 'user_favourites'));
    }

    public function verify($token)
    {
        $verificationToken = $token;
        $user = User::where('token', $verificationToken)->first();
        if (!$user) {
            abort(404);
        }

        $user->email_verified_at = now();
        $user->save();

        auth()->login($user);
        return redirect('/login');
    }
}
