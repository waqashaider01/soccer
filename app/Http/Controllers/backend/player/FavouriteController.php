<?php

namespace App\Http\Controllers\backend\player;

use DB;
use View;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Country;
use App\Models\Favourite;
use App\Models\Followers;
use App\Models\PlayerInfo;
use Illuminate\Http\Request;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{
    function favData(Request $req)
    {
        $player = PlayerInfo::find($req->fav_id);
        $user_id = Auth::user()->id;
        $fav_id = $req->fav_id;
        $data = Favourite::where('fav_id', $fav_id)->Where('user_id', $user_id)->first();
        if (isset($data) && $data) {
            $data->delete();
            $t = View::make('unfav', compact('player'))->render();
            return $t;
        } else {
            $fav = new Favourite;
            $fav->fav_id = $fav_id;
            $fav->user_id = $user_id;
            $fav->save();
            $t = View::make('fav', compact('player'))->render();
            return $t;
        }
        return response("done");
    }


    //============================================================
    public function favorite(Request $request)
    {
        $countries = Country::all();
        $Players = PlayerInfo::join('users', 'users.id', '=', 'player_infos.player_id')
            ->join('countries', 'countries.id', '=', 'player_infos.birth_country')
            ->join('favourites', 'favourites.fav_id', '=', 'users.id')
            ->where('favourites.user_id', auth()->user()->id)
            ->where(function ($query) use ($request) {
                if ($request->has('position')) {
                    $query->where('main_position', $request->position);
                }
            })
            ->where(function ($query) use ($request) {
                if ($request->has('country')) {
                    $query->where('birth_country', $request->country);
                }
            })
            ->where(function ($query) use ($request) {
                if ($request->has('status')) {
                    $query->where('player_infos.status', $request->status);
                }
            })
            ->where(function ($query) use ($request) {
                if ($request->has('name')) {
                    $query->where('users.name', 'like', '%' . $request->name . '%');
                }
            })
            ->select('player_infos.*', 'users.name', 'countries.name as country_name')
            ->paginate(4);
        foreach ($Players as $player) {
            $player->feet = floor($player->height / 12);
            $player->inches = round($player->height % 12);
            $player->pounds = round($player->weight / 0.45359237);
            $player->age = Carbon::parse($player->dob)->age;
        }
        return view('frontend.favorite', compact("Players", "countries"));
    }

    //============================================================
    public function RemoveFromFavourite($id)
    {
        $user = Favourite::where('user_id', Auth::id())->where('fav_id', $id)->first();
        $user->delete();
        return redirect()->back()->with('success', "Remove from Favouorte Succesfully");
    }

    //================================================================
    public function RemoveFromFollower($id)
    {
        $user = FOllowers::where('following', Auth::id())->where('follower', $id)->first();
        $user->delete();
        return redirect()->back()->with('success', 'Follower Removed Successfully');
    }
}
