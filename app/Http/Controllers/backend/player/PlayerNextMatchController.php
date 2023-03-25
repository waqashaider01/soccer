<?php

namespace App\Http\Controllers\backend\player;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\PlayerNextMatchSchedule;

class PlayerNextMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.player.profile.next-match-schedule.create");
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
            'myTeam' => 'required',
            'opposingTeam' => 'required',
            'homeMatch' => 'required',
            'matchType' => 'required',
            'venue' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        $PlayerAchievement=new PlayerNextMatchSchedule();
        $PlayerAchievement->player_id=Auth::user()->id;
        $PlayerAchievement->my_team=$validated["myTeam"];
        $PlayerAchievement->opposing_team=$validated["opposingTeam"];
        $PlayerAchievement->home_match=$validated["homeMatch"];
        $PlayerAchievement->match_type=$validated["matchType"];
        $PlayerAchievement->venue=$validated["venue"];
        $PlayerAchievement->date=$validated["date"];
        $PlayerAchievement->time=$validated["time"];
        $PlayerAchievement->live_stream_link=$request->liveStream;
        $PlayerAchievement->save();
        return Redirect("/dashboard/player/profile/")->with("next-match-success","Next Match Schedule created successfully!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $PlayerNextMatchSchedule=PlayerNextMatchSchedule::find($id);
        return view("backend.player.profile.next-match-schedule.edit",compact("PlayerNextMatchSchedule"));
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
            'myTeam' => 'required',
            'opposingTeam' => 'required',
            'homeMatch' => 'required',
            'matchType' => 'required',
            'venue' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        $PlayerAchievement=PlayerNextMatchSchedule::find($id);
        $PlayerAchievement->my_team=$validated["myTeam"];
        $PlayerAchievement->opposing_team=$validated["opposingTeam"];
        $PlayerAchievement->home_match=$validated["homeMatch"];
        $PlayerAchievement->match_type=$validated["matchType"];
        $PlayerAchievement->venue=$validated["venue"];
        $PlayerAchievement->date=$validated["date"];
        $PlayerAchievement->time=$validated["time"];
        $PlayerAchievement->live_stream_link=$request->liveStream;
        $PlayerAchievement->save();
        return Redirect("/dashboard/player/profile/")->with("next-match-success","Next Match Schedule updated successfully!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $PlayerNextMatchSchedule=PlayerNextMatchSchedule::find($id);
        $PlayerNextMatchSchedule->delete();
        return Redirect("/dashboard/player/profile/")->with("next-match-success","Next Match Schedule deleted successfully!");
    }
}
