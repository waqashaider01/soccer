<?php

namespace App\Http\Controllers\frontend;

use DB;
use Carbon\Carbon;
use App\Models\City;
use App\Models\User;
use App\Models\Country;
use App\Models\Followers;
use App\Models\PlayerInfo;
use App\Models\UserPrivacy;
use App\Models\BlockedUsers;
use Illuminate\Http\Request;
use App\Models\PlayerAttribute;
use App\Models\PlayerAchievement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\PlayerCareerMatchData;
use App\Models\PlayerTransferHistory;
use App\Models\PlayerNextMatchSchedule;


class PlayerFrontendController extends Controller
{
  
    public function imageUpload(Request $request, $id)
    {
        $cover_img = $request->file('cover_img');
        $imagename = time() . '.' . $cover_img->getClientOriginalExtension();
        $request->file('cover_img')->move('backend/images/players/profile/', $imagename);

        $cover_img = PlayerInfo::find($id);
        $cover_img->cover_img = 'backend/images/players/profile/' . $imagename;
        $cover_img->save();

        return redirect()->back()
            ->with('success', 'Image updated successfully');
    }



    public function index(Request $request)
    {
        $countries = Country::all();
        $Players = PlayerInfo::join('users', 'users.id', '=', 'player_infos.player_id')
            ->join('countries', 'countries.id', '=', 'player_infos.birth_country')
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
            ->paginate(10);
        // dd($Players);

        foreach ($Players as $player) {
            $player->feet = floor($player->height / 12);
            $player->inches = round($player->height % 12);
            $player->pounds = round($player->weight / 0.45359237);
            $player->age = Carbon::parse($player->dob)->age;
        }
        return view('frontend.players', compact("Players", "countries"));
    }


    public function show($id, PlayerInfo $playerRead)
    {
        $onlycontacts = [];
        $PlayerAttributes = [];
        $followstatus = 0;
        $msgstatus = "";
        $AuthId = Auth::id();
        $blockadmin = 0;
        $UserPrivacy = UserPrivacy::all();
        $follower = Followers::all();

        $user = User::find($id);
        if ($user) {
            if ($user->status == "blocked") {
                $blockadmin = 1;
            }
        }

        $onlycontacts = Followers::where('follower', '=', $id)->where('following', Auth::id())
            ->pluck('following')
            ->toArray() ?? '';
            
            // dd($onlycontacts);

        $followstatus = Followers::where('follower', "=", $AuthId)->where('following', "=", $id)->select('id')->get();

            if ($followstatus->isNotEmpty()) {
                // user is following player, set followstatus array
                $followstatus = [$id => ['id' => $id]];
            } else {
                // user is not following player, set followstatus to empty array
                $followstatus = [];
            }


        // dd($followstatus);

            if (empty($followstatus)) {
                $followingstatus = 0;
            } else {
                $followingstatus = 1;
            }

        
        // dd($followingstatus);

        $msgstatus = BlockedUsers::select('id')->where('user_id', $AuthId)->where('blocked_id', $id)->get() ?? '';
        if (is_null($msgstatus)) {
            $msgs = 0;
        } else {
            $msgs = 1;
        }
        // $playerRead = new PlayerInfo;
        $playerRead = $playerRead->find($id);
        if ($playerRead instanceof PlayerRead) {
            $playerRead->reads++;
            $playerRead->save();
        }


        $player = PlayerInfo::where("player_id", $id)->first() ?? '';
        // dd($player);
        $PlayerNextMatchSchedules = PlayerNextMatchSchedule::where("player_id", $id)->get() ?? '';
        $PlayerAchievements = PlayerAchievement::where("player_id", $id)->get() ?? '';
        $PlayerTransferHistories = PlayerTransferHistory::where("player_id", $id)->get() ?? '';
        // player career-match-data
        $PlayerDomesticCareerMatchDatas = PlayerCareerMatchData::where(["player_id" => $id, "competition" => "Domestic Cups"])->get() ?? '';
        $PlayerInternationalCareerMatchDatas = PlayerCareerMatchData::where(["player_id" => $id, "competition" => "International Cups"])->get() ?? '';
        $PlayerNationalCareerMatchDatas = PlayerCareerMatchData::where(["player_id" => $id, "competition" => "National Team"])->get() ?? '';
        $PlayerLeagueCareerMatchDatas = PlayerCareerMatchData::where(["player_id" => $id, "competition" => "League"])->get() ?? '';
        // player attributes
        $PlayerAttributes = PlayerAttribute::where("player_id", $id)->first() ?? '';

        $countries = Country::all();
        // dd($countries);
        $cities = City::all();
        // dd('hello');
        return view(
            'frontend.profile.player',
            compact(
                "player",
                "countries",
                "cities",
                "PlayerNextMatchSchedules",
                "PlayerAchievements",
                "PlayerTransferHistories",
                "PlayerDomesticCareerMatchDatas",
                "PlayerInternationalCareerMatchDatas",
                "PlayerNationalCareerMatchDatas",
                "PlayerLeagueCareerMatchDatas",
                "PlayerAttributes",
                'id',
                'followstatus',
                'msgstatus',
                'blockadmin',
                'UserPrivacy',
                'user',
                'onlycontacts',
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
