<?php

namespace App\Http\Controllers\backend\player;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\PlayerAchievement;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PlayerAchievementsController extends Controller
{
    public function index()
    {
        // $achievements = PlayerAchievement::where('player_id', Auth::id())->get();
        // return view('backend.player.achievements.index', compact('achievements'));
    }

    public function create()
    {
        $countries = Country::all();
        return view('backend.player.profile.achievements.create', compact('countries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'achievements' => 'required',
            'month' => 'required',
            'year' => 'required',
            'details' => 'required',
            'country_id' => 'required',
        ]);

        $achievement = PlayerAchievement::create([
            'player_id' => Auth()->id(),
            'achievements' => $request['achievements'],
            'month' => $request['month'],
            'year' => $request['year'],
            'details' => $request['details'],
            'country_id' => $request['country_id'],
        ]);

        if ($achievement) {
            return redirect()->back()
            ->with('success', 'Achievement created successfully');
        }
    }

    public function edit($id)
    {
        $achievement = PlayerAchievement::find($id);
        $countries = Country::all();
        return view('backend.player.profile.achievements.edit', compact('achievement', 'countries'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'achievements' => 'required',
            'month' => 'required',
            'year' => 'required',
            'details' => 'required',
            'country_id' => 'required',
        ]);

        $achievement = PlayerAchievement::where('id', $request['cid'])->update([
            'achievements' => $request['achievements'],
            'month' => $request['month'],
            'year' => $request['year'],
            'details' => $request['details'],
            'country_id' => $request['country_id'],
        ]);

        if ($achievement) {
            return redirect()->route('player.all-achievements')
            ->with('success', 'Achievement updated successfully');
        }
    }

    public function destroy($id)
    {
        $achievement = PlayerAchievement::find($id)->delete();
        if ($achievement) {
            return redirect()->route('player.all-achievements')
            ->with('success', 'Achievement deleted successfully');
        }
    }
}
