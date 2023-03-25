<?php

namespace App\Http\Controllers\backend\agent\market;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\MarketRequestPlayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketRequestPlayerController extends Controller
{
    // ********************************index Method ***********************************/
    public function index()
    {
        $allRequestPlayers = MarketRequestPlayer::where('agent_id', Auth::id())->get();
        return view('backend.agent.market.request-player.index', compact('allRequestPlayers'));
    }

    // ********************************Create Method ***********************************/
    public function create()
    {
        $agent     = MarketRequestPlayer::where('agent_id', Auth::id())->first();
        $countries = Country::all();
        $cities    = City::all();
        return view(
            'backend.agent.market.request-player.create',
            compact('agent', 'countries', 'cities')
        );
    }

    // ********************************store Method ***********************************/
    public function store(Request $request)
    {
        $request->validate([
            'expiry_date'               => ['required'],
            'for_whom'                  => ['required'],
            'upload_logo'               => ['required'],
            'description'               => ['required'],
            'league_division'           => ['required'],
            'player_gender'             => ['required'],
            'player_position'           => ['required'],
            'player_min_age'            => ['required'],
            'player_max_age'            => ['required'],
            'eu_passport_required'      => ['required'],
            'transfer_fee'              => ['required'],
            'monthly_salary'            => ['required'],
            'training_compensation_fee' => ['required'],
            'trial_conditions'          => ['required'],
            'profile_type'              => ['required'],
            'telephone'                 => ['required'],
            'email'                     => ['required'],
            'website'                   => ['required'],
            'social_media_link'         => ['required'],
            'additional_information'    => ['required']
        ]);

        if ($request->hasFile('upload_logo')) {
            $imgName        = time() . '.' . $request->upload_logo->extension();
            $uploadLocation = "backend/images/agent/logo/";
            $request->upload_logo->move(public_path("backend/images/agent/logo/"), $imgName);
        }

        $agent = MarketRequestPlayer::create([
            'agent_id'                       => Auth::id(),
            'slug'                           => 'request-a-player',
            'expiry_date'                    => $request['expiry_date'],
            'for_whom'                       => json_encode($request['for_whom']),
            'upload_logo'                    => $uploadLocation . $imgName,
            'description'                    => $request['description'],
            'league_division'                => $request['league_division'],
            'country_id'                     => $request['country_id'],
            'player_gender'                  => $request['player_gender'],
            'player_position'                => json_encode($request['player_position']),
            'player_min_age'                 => $request['player_min_age'],
            'player_max_age'                 => $request['player_max_age'],
            'eu_passport_required'           => $request['eu_passport_required'],
            'transfer_fee'                   => $request['transfer_fee'],
            'monthly_salary'                 => $request['monthly_salary'],
            'training_compensation_fee'      => $request['training_compensation_fee'],
            'trial_conditions'               => $request['trial_conditions'],
            'profile_type'                   => $request['profile_type'],
            'telephone'                      => $request['telephone'],
            'email'                          => $request['email'],
            'website'                        => $request['website'],
            'social_media_link'              => $request['social_media_link'],
            'additional_information'         => $request['additional_information']
        ]);

        if ($agent) {
            return redirect()->route('request-player.market-post-request-player')
                ->with('success', 'Request Player created successfully');
        } else {
            return redirect()->route('request-player.market-post-request-player')
                ->with('error', 'Something went wrong');
        }
    }

    // ********************************edit Method ***********************************/
    public function edit($id)
    {
        $agent    = MarketRequestPlayer::find($id);
        $for_whom = json_decode($agent->for_whom, true);
        $player_position = json_decode($agent->player_position, true);

        $countries = Country::all();
        $cities    = City::all();
        return view(
            'backend.agent.market.request-player.edit',
            compact('agent', 'countries', 'cities', 'for_whom', 'player_position')
        );
    }

    // ********************************Update Method ***********************************/
    public function update(Request $request)
    {
        $request->validate([
            'expiry_date'               => ['required'],
            'for_whom'                  => ['required'],
            'upload_logo'               => ['required'],
            'description'               => ['required'],
            'league_division'           => ['required'],
            'player_gender'             => ['required'],
            'player_position'           => ['required'],
            'player_min_age'            => ['required'],
            'player_max_age'            => ['required'],
            'eu_passport_required'      => ['required'],
            'transfer_fee'              => ['required'],
            'monthly_salary'            => ['required'],
            'training_compensation_fee' => ['required'],
            'trial_conditions'          => ['required'],
            'profile_type'              => ['required'],
            'telephone'                 => ['required'],
            'email'                     => ['required'],
            'website'                   => ['required'],
            'social_media_link'         => ['required'],
            'additional_information'    => ['required']
        ]);

        $oldLogo = MarketRequestPlayer::find($request['cid']);
        if (file_exists($oldLogo->upload_logo)) {
            unlink($oldLogo->upload_logo);
        }

        if ($request->hasFile('upload_logo')) {
            $imgName        = time() . '.' . $request->upload_logo->extension();
            $uploadLocation = "backend/images/agent/logo/";
            $request->upload_logo->move(public_path("backend/images/agent/logo/"), $imgName);
            $image = $uploadLocation . $imgName;
        }

        $agent = MarketRequestPlayer::where('id', $request['cid'])->update([
            'agent_id'                       => Auth::id(),
            'slug'                           => 'request-a-player',
            'expiry_date'                    => $request['expiry_date'],
            'for_whom'                       => json_encode($request['for_whom']),
            'upload_logo'                    => $uploadLocation . $imgName,
            'description'                    => $request['description'],
            'league_division'                => $request['league_division'],
            'country_id'                     => $request['country_id'],
            'player_gender'                  => $request['player_gender'],
            'player_position'                => json_encode($request['player_position']),
            'player_min_age'                 => $request['player_min_age'],
            'player_max_age'                 => $request['player_max_age'],
            'eu_passport_required'           => $request['eu_passport_required'],
            'transfer_fee'                   => $request['transfer_fee'],
            'monthly_salary'                 => $request['monthly_salary'],
            'training_compensation_fee'      => $request['training_compensation_fee'],
            'trial_conditions'               => $request['trial_conditions'],
            'profile_type'                   => $request['profile_type'],
            'telephone'                      => $request['telephone'],
            'email'                          => $request['email'],
            'website'                        => $request['website'],
            'social_media_link'              => $request['social_media_link'],
            'additional_information'         => $request['additional_information']
        ]);

        if ($agent) {
            return redirect()->route('request-player.market-post-request-player')
                ->with('success', 'Request Player updated successfully');
        } else {
            return redirect()->route('request-player.market-post-request-player')
                ->with('error', 'Something went wrong');
        }
    }

    // ********************************destroy Method ***********************************/
    public function destroy($id)
    {
        $agent = MarketRequestPlayer::find($id);
        if (file_exists($agent->upload_logo)) {
            unlink($agent->upload_logo);
        }
        $agent->delete();
        return redirect()->route('request-player.market-post-request-player')
            ->with('success', 'Request Player deleted successfully');
    }
}
