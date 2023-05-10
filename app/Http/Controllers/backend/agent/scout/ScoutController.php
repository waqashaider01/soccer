<?php

namespace App\Http\Controllers\backend\agent\scout;

use App\Http\Controllers\Controller;
use App\Models\AgentAchievement;
use App\Models\City;
use App\Models\Country;
use App\Models\Language;
use App\Models\PlayersPortfolio;
use App\Models\ScoutInfo;
use App\Models\TransferHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScoutController extends Controller
{
    public function profile()
    {
        $agent            = ScoutInfo::where("scout_id", Auth::id())->first();
        $achievements     = AgentAchievement::where("agent_id", Auth::id())->get();
        $playersPortfolio = PlayersPortfolio::where("agent_id", Auth::id())->get();
        $transferHistory  = TransferHistory::where("agent_id", Auth::id())->get();

        $countries = Country::all();
        $languages = Language::all();
        $cities    = City::all();
        return view(
            "backend.agent.scout.index",
            compact(
                "agent",
                "countries",
                'cities',
                "languages",
                "achievements",
                "playersPortfolio",
                "transferHistory"
            ));
    }
}
