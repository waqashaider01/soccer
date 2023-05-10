<?php

namespace App\Http\Controllers\backend\player;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;
use App\Models\PlayerCareerMatchData;

class PlayerCareerMatchDataController extends Controller
{
    public function index()
    {
        // $PlayerCareerMatchDatas="salman";
        // return view("dashboard.profile.career-match-data",compact("PlayerCareerMatchDatas"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries=Country::all();
        return view("backend.player.profile.career-match-data.create",compact("countries"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'season' => 'required',
            'team' => 'required',
            'country' => 'required',
            'competition' => 'required',
            'matchesPlayed' => 'required',
            'goals' => 'required',
            'assists' => 'required',
            'substituteIn' => 'required',
            'substituteOut' => 'required',
            'yellowCards' => 'required',
            'secondYellowCards' => 'required',
            'redCards' => 'required',
        ]);

        $PlayerCareerMatchData=new PlayerCareerMatchData();
        $PlayerCareerMatchData->player_id=Auth::user()->id;
        $PlayerCareerMatchData->season=$validated["season"];
        $PlayerCareerMatchData->team=$validated["team"];
        $PlayerCareerMatchData->country=$validated["country"];
        $PlayerCareerMatchData->competition=$validated["competition"];
        $PlayerCareerMatchData->matches_played=$validated["matchesPlayed"];
        $PlayerCareerMatchData->goals=$validated["goals"];
        $PlayerCareerMatchData->assists=$validated["assists"];
        $PlayerCareerMatchData->substitute_in=$validated["substituteIn"];
        $PlayerCareerMatchData->substitute_out=$validated["substituteOut"];
        $PlayerCareerMatchData->yellow_cards=$validated["yellowCards"];
        $PlayerCareerMatchData->second_yellow_cards=$validated["secondYellowCards"];
        $PlayerCareerMatchData->red_cards=$validated["redCards"];
        $PlayerCareerMatchData->save();
        return redirect()->route('player.dashboard')->with("success","Career Match Data created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $PlayerCareerMatchData=PlayerCareerMatchData::find($id);
        $countries=Country::all();
        return view("backend.player.profile.career-match-data.edit",compact("PlayerCareerMatchData","countries"));
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
        $validated = $request->validate([
            'season' => 'required',
            'team' => 'required',
            'country' => 'required',
            'competition' => 'required',
            'matchesPlayed' => 'required',
            'goals' => 'required',
            'assists' => 'required',
            'substituteIn' => 'required',
            'substituteOut' => 'required',
            'yellowCards' => 'required',
            'secondYellowCards' => 'required',
            'redCards' => 'required',
        ]);

        $PlayerCareerMatchData=PlayerCareerMatchData::find($id);
        $PlayerCareerMatchData->season=$validated["season"];
        $PlayerCareerMatchData->team=$validated["team"];
        $PlayerCareerMatchData->country=$validated["country"];
        $PlayerCareerMatchData->competition=$validated["competition"];
        $PlayerCareerMatchData->matches_played=$validated["matchesPlayed"];
        $PlayerCareerMatchData->goals=$validated["goals"];
        $PlayerCareerMatchData->assists=$validated["assists"];
        $PlayerCareerMatchData->substitute_in=$validated["substituteIn"];
        $PlayerCareerMatchData->substitute_out=$validated["substituteOut"];
        $PlayerCareerMatchData->yellow_cards=$validated["yellowCards"];
        $PlayerCareerMatchData->second_yellow_cards=$validated["secondYellowCards"];
        $PlayerCareerMatchData->red_cards=$validated["redCards"];
        $PlayerCareerMatchData->save();
        return redirect()->route('player.dashboard')->with("success","Career Match Data updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PlayerCareerMatchData=PlayerCareerMatchData::find($id);
        $PlayerCareerMatchData->delete();
        return redirect()->route('player.dashboard')->with("success","Career Match Data deleted successfully!");
    }
}
