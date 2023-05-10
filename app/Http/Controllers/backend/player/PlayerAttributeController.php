<?php

namespace App\Http\Controllers\backend\player;

use Illuminate\Http\Request;
use App\Models\PlayerAttribute;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlayerAttributeController extends Controller
{
    public function attributesSave(Request $request)
    {
        // dd($request->all());
        $PlayerAttribute = PlayerAttribute::where("player_id", auth()->user()->id)->first();
        if(!$PlayerAttribute)
        {
            $PlayerAttribute=new PlayerAttribute();
            $PlayerAttribute->player_id = auth()->user()->id;
        }
      
        $PlayerAttribute->ball_control = $request->ballControl;
        $PlayerAttribute->corners = $request->corners;
        $PlayerAttribute->crossing = $request->crossing;
        $PlayerAttribute->dribbling = $request->dribbling;
        $PlayerAttribute->finishing = $request->finishing;
        $PlayerAttribute->first_touch = $request->firstTouch;
        $PlayerAttribute->free_kick_taking = $request->freeKickTaking;
        $PlayerAttribute->heading = $request->heading;
        $PlayerAttribute->long_shots = $request->longShots;
        $PlayerAttribute->long_throws = $request->longThrows;
        $PlayerAttribute->marking = $request->marking;
        $PlayerAttribute->passing = $request->passing;
        $PlayerAttribute->penalty_taking = $request->penaltyTaking;
        $PlayerAttribute->tackling = $request->tackling;
        $PlayerAttribute->technique = $request->technique;
        $PlayerAttribute->aggression = $request->aggression;
        $PlayerAttribute->anticipation = $request->anticipation;
        $PlayerAttribute->bravery = $request->bravery;
        $PlayerAttribute->composure = $request->composure;
        $PlayerAttribute->concentration = $request->concentration;
        $PlayerAttribute->creativity = $request->creativity;
        $PlayerAttribute->decisions = $request->decisions;
        $PlayerAttribute->determination = $request->determination;
        $PlayerAttribute->flair = $request->flair;
        $PlayerAttribute->influence = $request->influence;
        $PlayerAttribute->off_the_ball = $request->offTheBall;
        $PlayerAttribute->positioning = $request->positioning;
        $PlayerAttribute->team_work = $request->teamWork;
        $PlayerAttribute->work_rate = $request->workRate;
        $PlayerAttribute->acceleration = $request->acceleration;
        $PlayerAttribute->agility = $request->agility;
        $PlayerAttribute->balance = $request->balance;
        $PlayerAttribute->jumping = $request->jumping;
        $PlayerAttribute->natural_fitness = $request->naturalFitness;
        $PlayerAttribute->reflexes = $request->reflexes;
        $PlayerAttribute->speed = $request->speed;
        $PlayerAttribute->stamina = $request->stamina;
        $PlayerAttribute->strength = $request->strength;
        $PlayerAttribute->goalkeeping = $request->goalkeeping;
        $PlayerAttribute->save();
        return redirect()->back()->with("attributes-success", "Arttibutes has been updated successfully!");
    }
}
