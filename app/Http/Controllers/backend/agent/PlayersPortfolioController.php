<?php

namespace App\Http\Controllers\backend\agent;

use App\Http\Controllers\Controller;
use App\Models\PlayersPortfolio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayersPortfolioController extends Controller
{

    public function fetchDetails(Request $request)
    {
        $playerData = User::query()
            ->where('id', $request['player_id'])
            ->first();
        return response()->json($playerData);
    }

    public function create(Request $request)
    {
        $allPlayers = User::where("type", "player")->get();
        return view('backend.agent.players-portfolio.create', compact('allPlayers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'profile_link' => ['required'],
        ]);

        $playerExists = PlayersPortfolio::where("player_id", $request['player_id'])
            ->where("agent_id", Auth::id())
            ->first();

        if (!$playerExists) {
            $playersPortfolio = PlayersPortfolio::create([
                'agent_id' => Auth::id(),
                'player_id' => $request['player_id'],
                'name' => $request['name'],
                'profile_link' => $request['player_id'],
            ]);

            if ($playersPortfolio) {
                return redirect()->route(Auth::user()->type . '.profile')
                ->with('success', 'Player Portfolio added successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong, please try again');
            }
        } else {
            return redirect()->back()->with('error', 'Player already exists in portfolio');
        }
    }


    public function edit($id)
    {
        return view('backend.agent.players-portfolio.edit');
    }


    public function destroy($id)
    {
        $playersPortfolio = PlayersPortfolio::find($id)->delete();

        if ($playersPortfolio) {
            return redirect()->route(Auth::user()->type . '.profile')
                ->with('success', 'Player Portfolio deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong, please try again');
        }
    }

}
