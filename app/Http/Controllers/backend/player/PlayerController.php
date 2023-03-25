<?php

namespace App\Http\Controllers\backend\player;

use App\Models\City;
use App\Models\User;
use App\Models\Country;
use App\Models\Message;
use App\Models\Language;
use App\Models\PlayerCV;
use App\Models\Followers;
use App\Models\PlayerInfo;
// use App\Models\notification;
use Illuminate\Http\Request;
use App\Models\VerifyAccount;
use App\Models\PlayerAttribute;
use App\Models\PlayerAchievement;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Favourite;
use Illuminate\Support\Facades\Auth;
use App\Models\PlayerCareerMatchData;
use App\Models\PlayerTransferHistory;
use App\Models\PlayerNextMatchSchedule;


class PlayerController extends Controller
{
    public function index()
    {
        $id1        = Auth::id();
        $user       = User::where('id', $id1)->first();
        $follower   = DB::table('followers')->where('following', '=', $id1)->count();
        $following  = DB::table('followers')->where('follower', '=', $id1)->count();
        $view       = PlayerInfo::where('player_id', $id1)->first();
        $favourtes  = Favourite::where('user_id', $id1)->count();

        $profileimages = PlayerInfo::where('player_id', $id1)->whereNotNull('profile_img')->count();
        $attributes    = PlayerAttribute::where('player_id', $id1)->count();
        $city          = PlayerInfo::where('player_id', $id1)->whereNotNull('birth_city')->count();
        $country       = playerInfo::where('player_id', $id1)->whereNotNull('birth_country')->count();
        $varification  = verifyAccount::where('status', 1)->count();

        if ($view) {
            $views = $view;
        } else {
            $views = [];
        }
        $verified       = VerifyAccount::where('user_id', Auth::user()->id)->get();
        $verifiedstyle  = VerifyAccount::where('user_id', Auth::user()->id)->where('status', 1)->count();
        $agelimit       = DB::table('guardian_approvals', Auth::user()->id)->where('status', NULL)->count();

        return view("backend.player.index", compact('user', 'views', 'follower',
         'following', 'verified', 'verifiedstyle', 'favourtes',
         'profileimages', 'attributes', 'city', 'country','varification'));
    }

    //===================================================
    public function ageLimit()
    {
        $agelimit = DB::table('guardian_approvals', Auth::user()->id)->where('status', 4)->count();
        return view("backend.player.underage", compact('agelimit'));
    }

    //===================================================
    public function profile()
    {
        $playerInfo = PlayerInfo::where("player_id", Auth::user()->id)->first();
        $PlayerCareerMatchDatas   = PlayerCareerMatchData::where("player_id", Auth::user()->id)->get();
        $PlayerTransferHistories  = PlayerTransferHistory::where("player_id", Auth::user()->id)->get();
        $PlayerAchievements       = PlayerAchievement::where("player_id", Auth::id())->get();
        $PlayerNextMatchSchedules = PlayerNextMatchSchedule::where("player_id", Auth::user()->id)->get();
        $PlayerAttribute          = PlayerAttribute::where("player_id", Auth::user()->id)->first();
        $PlayerCVs                = PlayerCV::where("player_id", Auth::id())->get();
        $countries                = Country::all();
        $languages                = Language::all();
        $cities                   = City::all();

        return view("backend.player.profile.index", compact("playerInfo", "countries", 'cities', "languages", "PlayerCareerMatchDatas", "PlayerTransferHistories", "PlayerAchievements", "PlayerNextMatchSchedules", "PlayerAttribute", "PlayerCVs"));
    }



    //===================================================
    public function notifications()
    {
        return view("backend.player.notifications");
    }

    //===================================================
    public function messages($rec_id)
    {
        $receiver = User::where('id', $rec_id)->first();
        $authid   = Auth::user()->id;
        $inbox   = Message::where('receiver_id', $authid)->where('delete_at_receiver', 0)->get();

        $starred_message = Message::where('receiver_id', $authid)->where('starred_message', 1)
            ->where('delete_at_receiver', 0)->get();
        foreach ($starred_message as $starred_messages) {
            $temp = User::select('name')->where('id', $starred_messages->sender_id)->first();
            $starred_messages->sender_name = $temp->name;
        }

        $sent_message = Message::where('sender_id', $authid)->where('delete_at_sender', 0)->get();
        foreach ($sent_message as $sent_messages) {
            $temp = User::select('name')->where('id', $sent_messages->receiver_id)->first();
            $sent_messages->receiver_name = $temp->name;
        }

        $sent_count = $sent_message->count();
        return view("backend.player.messages")->with([
            'receiver'          => $receiver,
            'inbox'             => $inbox,
            'starred_message'   => $starred_message,
            'sent_message'      => $sent_message,
            'sent_count'        => $sent_count
        ]);
    }


    //===================================================
    public function messagess()
    {
        $authid = Auth::user()->id;
        $inbox  = Message::where('receiver_id', $authid)->where('delete_at_receiver', 0)->get();
        foreach ($inbox as $inboxs) {
            $temp = User::select('name')->where('id', $inboxs->sender_id)->first();
            $inboxs->sender_name = $temp->name;
        }
        $inbox_count = $inbox->where('read_message', 0)->count();

        $starred_message = Message::where('receiver_id', $authid)->where('starred_message', 1)
            ->where('delete_at_receiver', 0)->get();
        foreach ($starred_message as $starred_messages) {
            $temp = User::select('name')->where('id', $starred_messages->sender_id)->first();
            $starred_messages->sender_name = $temp->name;
        }

        $star_count   = $starred_message->where('read_message', 0)->count();
        $sent_message = Message::where('sender_id', $authid)->where('delete_at_sender', 0)->get();

        foreach ($sent_message as $sent_messages) {
            $temp = User::select('name')->where('id', $sent_messages->receiver_id)->first();
            $sent_messages->receiver_name = $temp->name;
        }
        $sent_count = $sent_message->count();

        if(Auth::user()->type == 'admin'){
            return view("backend.admin.messages")
            ->with([
                'inbox' => $inbox,
                'starred_message' => $starred_message,
                'sent_message'    => $sent_message,
                'sent_count'      => $sent_count,
                'inbox_count'     => $inbox_count,
                'star_count'      => $star_count
            ]);
        }
        if(Auth::user()->type == 'player'){
            return view("backend.player.messages")
            ->with([
                'inbox' => $inbox,
                'starred_message' => $starred_message,
                'sent_message'    => $sent_message,
                'sent_count'      => $sent_count,
                'inbox_count'     => $inbox_count,
                'star_count'      => $star_count
            ]);
        }

    }

    //===================================================
    public function activity()
    {
        return view("backend.player.activity");
    }
}
