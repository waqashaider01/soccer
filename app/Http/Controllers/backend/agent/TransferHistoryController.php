<?php

namespace App\Http\Controllers\backend\agent;

use App\Http\Controllers\Controller;
use App\Models\TransferHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransferHistoryController extends Controller
{
    public function create(Request $request)
    {
        $allPlayers = User::where("type", "player")->get();
        return view('backend.agent.transfer-history.create', compact('allPlayers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => ['required'],
            'club_from' => ['required'],
            'club_to' => ['required'],
            'transfer_type' => ['required'],
        ]);

        $playerExists = TransferHistory::where("player_id", $request['player_id'])
        ->where("agent_id", Auth::id())
            ->first();

        if (!$playerExists) {
            $transferHistory = TransferHistory::create([
                'agent_id' => Auth::id(),
                'player_id' => $request['player_id'],
                'date' => $request['date'],
                'club_from' => $request['club_from'],
                'club_to' => $request['club_to'],
                'transfer_type' => $request['transfer_type'],
            ]);

            if ($transferHistory) {
                return redirect()->route(Auth::user()->type . '.dashboard')
                ->with('success', 'Transfer History added successfully');
            } else {
                return redirect()->back()->with('error', 'Something went wrong, please try again');
            }
        } else {
            return redirect()->back()->with('error', 'Transfer History exists in portfolio');
        }
    }

    public function edit($id)
    {
        $allPlayers = User::where("type", "player")->get();
        $transferHistory = TransferHistory::find($id);
        return view('backend.agent.transfer-history.edit', compact('transferHistory', 'allPlayers'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'date' => ['required'],
            'club_from' => ['required'],
            'club_to' => ['required'],
            'transfer_type' => ['required'],
        ]);

        $transferHistory = TransferHistory::where("id", $request['cid'])->update([
            'agent_id' => Auth::id(),
            'player_id' => $request['player_id'],
            'date' => $request['date'],
            'club_from' => $request['club_from'],
            'club_to' => $request['club_to'],
            'transfer_type' => $request['transfer_type'],
        ]);

        if ($transferHistory) {
            return redirect()->route(Auth::user()->type . '.dashboard')
            ->with('success', 'Transfer History updated successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong, please try again');
        }
    }

    public function destroy($id)
    {
        $transferHistory = TransferHistory::find($id)->delete();

        if ($transferHistory) {
            return redirect()->route(Auth::user()->type . '.dashboard')
            ->with('success', 'Transfer History deleted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong, please try again');
        }
    }
}
