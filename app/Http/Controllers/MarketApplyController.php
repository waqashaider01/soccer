<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MarketApply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketApplyController extends Controller
{

    //===================================================
    public function store(Request $request)
    {
        $request->validate([
            'agent_id'        => ['required'],
            'market_id'       => ['required'],
            'market_type'     => ['required'],
            'additional_info' => ['required']
        ]);

        $marketApply = MarketApply::create([
            'player_id'         => Auth::id(),
            'agent_id'          => $request['agent_id'],
            'market_id'         => $request['market_id'],
            'market_type'       => $request['market_type'],
            'additional_info'   => $request['additional_info']
        ]);

        if ($marketApply) {
            return redirect()->back()->with('success', 'You have successfully applied for this market.');
        } else {
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }
}
