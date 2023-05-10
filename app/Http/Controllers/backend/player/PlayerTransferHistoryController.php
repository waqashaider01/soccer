<?php

namespace App\Http\Controllers\backend\player;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\PlayerTransferHistory;

class PlayerTransferHistoryController extends Controller
{

    public function create()
    {
        return view("backend.player.profile.transfer-history.create");
    }


    //=============================================================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'transferDate' => 'required',
            'transferFromTeam' => 'required',
            'transferToTeam' => 'required',
            'transferType' => 'required',
        ]);

        $PlayerTransferHistory = new PlayerTransferHistory();
        $PlayerTransferHistory->player_id          = Auth::user()->id;
        $PlayerTransferHistory->transfer_date      = $validated["transferDate"];
        $PlayerTransferHistory->transfer_from_team = $validated["transferFromTeam"];
        $PlayerTransferHistory->transfer_to_team   = $validated["transferToTeam"];
        $PlayerTransferHistory->transfer_type      = $validated["transferType"];
        $PlayerTransferHistory->save();
        return redirect()->route('player.dashboard')->with("transfer-history-success", "Transfer History created successfully!");
    }


    //=============================================================
    public function edit($id)
    {
        $PlayerTransferHistory = PlayerTransferHistory::find($id);
        return view("backend.player.profile.transfer-history.edit", compact("PlayerTransferHistory"));
    }

    //=============================================================
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'transferDate' => 'required',
            'transferFromTeam' => 'required',
            'transferToTeam' => 'required',
            'transferType' => 'required',
        ]);

        $PlayerTransferHistory = PlayerTransferHistory::find($id);
        $PlayerTransferHistory->transfer_date      = $validated["transferDate"];
        $PlayerTransferHistory->transfer_from_team = $validated["transferFromTeam"];
        $PlayerTransferHistory->transfer_to_team   = $validated["transferToTeam"];
        $PlayerTransferHistory->transfer_type      = $validated["transferType"];
        $PlayerTransferHistory->save();
        return redirect()->route('player.dashboard')->with("transfer-history-success", "Tranfer History created successfully!");
    }

    //=============================================================
    public function destroy($id)
    {
        $PlayerTransferHistory = PlayerTransferHistory::find($id);
        $PlayerTransferHistory->delete();
        return redirect()->route('player.dashboard')->with("transfer-history-success", "Transfer History deleted successfully!");
    }
}
