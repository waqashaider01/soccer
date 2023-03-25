<?php

namespace App\Http\Controllers\backend\agent;

use App\Http\Controllers\Controller;
use App\Models\AgentAchievement;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentAchievementController extends Controller
{
    public function index()
    {
        $achievements = AgentAchievement::all();
        return view('backend.agent.achievements.index', compact('achievements'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('backend.agent.achievements.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'achievements'   => 'required',
            'month'          => 'required',
            'year'           => 'required',
            'details'        => 'required',
            'country_id'     => 'required',
        ]);

        $achievement = AgentAchievement::create([
            'agent_id'          => Auth()->id(),
            'achievements'      => $request['achievements'],
            'month'             => $request['month'],
            'year'              => $request['year'],
            'details'           => $request['details'],
            'country_id'        => $request['country_id'],
        ]);

        if ($achievement) {
            return redirect()->route('agent.all-achievements')
                ->with('success', 'Achievement created successfully');
        }
    }

    public function edit($id)
    {
        $achievement = AgentAchievement::find($id);
        $countries   = Country::all();
        return view('backend.agent.achievements.edit', compact('achievement', 'countries'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'achievements'   => 'required',
            'month'          => 'required',
            'year'           => 'required',
            'details'        => 'required',
            'country_id'     => 'required',
        ]);

        $achievement = AgentAchievement::where('id', $request['cid'])->update([
            'achievements'      => $request['achievements'],
            'month'             => $request['month'],
            'year'              => $request['year'],
            'details'           => $request['details'],
            'country_id'        => $request['country_id'],
        ]);

        if ($achievement) {
            return redirect()->route(Auth::user()->type . '.dashboard')
                ->with('success', 'Achievement updated successfully');
        }
    }

    public function destroy($id)
    {
        $achievement = AgentAchievement::find($id)->delete();
        if ($achievement) {
            return redirect()->route(Auth::user()->type . '.dashboard')
                ->with('success', 'Achievement deleted successfully');
        }
    }
}
