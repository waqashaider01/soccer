<?php

namespace App\Http\Controllers\backend\agent\market;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\MarketRecommendPlayer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketRecommendPlayerController extends Controller
{
    // ********************************Index Method ***********************************/
    public function index()
    {
        $allRecommendPlayers = MarketRecommendPlayer::where('agent_id', Auth::id())->get();
        return view('backend.agent.market.recommend-player.index', compact('allRecommendPlayers'));
    }

    // ********************************Create Method ***********************************/
    public function create()
    {
        $agent     = MarketRecommendPlayer::where('agent_id', Auth::id())->first();
        $countries = Country::all();
        $cities    = City::all();
        return view('backend.agent.market.recommend-player.create', compact('agent', 'countries', 'cities'));
    }

    // ********************************store Method ***********************************/
    public function store(Request $request)
    {
        $request->validate([
            'expiry_date'                   => ['required'],
            'for_whom'                      => ['required'],
            'upload_logo'                   => ['required'],
            'description'                   => ['required'],
            'player_age'                    => ['required'],
            'player_gender'                 => ['required'],
            'country_id'                    => ['required'],
            'eu_passport_required'          => ['required'],
            'player_main_position'          => ['required'],
            'player_alternative_position'   => ['required'],
            'transfer_fee'                  => ['required'],
            'monthly_salary'                => ['required'],
            'training_compensation_fee'     => ['required'],
            'trial_conditions'              => ['required'],
            'profile_type'                  => ['required'],
            'telephone'                     => ['required'],
            'email'                         => ['required'],
            'website'                       => ['required'],
            'social_media_link'             => ['required'],
            'additional_information'        => ['required']
        ]);

        if ($request->hasFile('upload_logo')) {
            $imgName        = time() . '.' . $request->upload_logo->extension();
            $uploadLocation = "backend/images/agent/logo/";
            $request->upload_logo->move(public_path("backend/images/agent/logo/"), $imgName);
        }

        $agent = MarketRecommendPlayer::create([
            'agent_id'                      => Auth::id(),
            'slug'                          => 'recommend-a-player',
            'expiry_date'                   => $request['expiry_date'],
            'for_whom'                      => json_encode($request['for_whom']),
            'upload_logo'                   => $uploadLocation . $imgName,
            'description'                   => $request['description'],
            'player_age'                    => $request['player_age'],
            'player_gender'                 => $request['player_gender'],
            'country_id'                    => $request['country_id'],
            'eu_passport_required'          => $request['eu_passport_required'],
            'player_main_position'          => json_encode($request['player_main_position']),
            'player_alternative_position'   => json_encode($request['player_alternative_position']),
            'transfer_fee'                  => $request['transfer_fee'],
            'monthly_salary'                => $request['monthly_salary'],
            'training_compensation_fee'     => $request['training_compensation_fee'],
            'trial_conditions'              => $request['trial_conditions'],
            'profile_type'                  => $request['profile_type'],
            'telephone'                     => $request['telephone'],
            'email'                         => $request['email'],
            'website'                       => $request['website'],
            'social_media_link'             => $request['social_media_link'],
            'additional_information'        => $request['additional_information']
        ]);

        if ($agent) {
            return redirect()->route('recommend-player.market-post-recommend-player')
                ->with('success', 'Recommend A Player created successfully');
        } else {
            return redirect()->route('recommend-player.market-post-recommend-player')
                ->with('error', 'Something went wrong');
        }
    }

    // ********************************edit Method ***********************************/
    public function edit($id)
    {
        $agent    = MarketRecommendPlayer::find($id);
        $for_whom = json_decode($agent->for_whom, true);
        $player_main_position        = json_decode($agent->player_main_position, true);
        $player_alternative_position = json_decode($agent->player_alternative_position, true);

        $countries = Country::all();
        $cities = City::all();
        return view(
            'backend.agent.market.recommend-player.edit',
            compact(
                'agent',
                'countries',
                'cities',
                'for_whom',
                'player_main_position',
                'player_alternative_position'
            )
        );
    }

    // ********************************update Method ***********************************/
    public function update(Request $request)
    {
        $request->validate([
            'expiry_date'                   => ['required'],
            'for_whom'                      => ['required'],
            'upload_logo'                   => ['required'],
            'description'                   => ['required'],
            'player_age'                    => ['required'],
            'player_gender'                 => ['required'],
            'country_id'                    => ['required'],
            'eu_passport_required'          => ['required'],
            'player_main_position'          => ['required'],
            'player_alternative_position'   => ['required'],
            'transfer_fee'                  => ['required'],
            'monthly_salary'                => ['required'],
            'training_compensation_fee'     => ['required'],
            'trial_conditions'              => ['required'],
            'profile_type'                  => ['required'],
            'telephone'                     => ['required'],
            'email'                         => ['required'],
            'website'                       => ['required'],
            'social_media_link'             => ['required'],
            'additional_information'        => ['required']
        ]);

        $oldLogo = MarketRecommendPlayer::find($request['cid']);
        if (file_exists($oldLogo->upload_logo)) {
            unlink($oldLogo->upload_logo);
        }

        if ($request->hasFile('upload_logo')) {
            $imgName        = time() . '.' . $request->upload_logo->extension();
            $uploadLocation = "backend/images/agent/logo/";
            $request->upload_logo->move(public_path("backend/images/agent/logo/"), $imgName);
            $image = $uploadLocation . $imgName;
        }

        $agent = MarketRecommendPlayer::where('id', $request['cid'])->update([
            'agent_id'                      => Auth::id(),
            'slug'                          => 'recommend-a-player',
            'expiry_date'                   => $request['expiry_date'],
            'for_whom'                      => json_encode($request['for_whom']),
            'upload_logo'                   => $uploadLocation . $imgName,
            'description'                   => $request['description'],
            'player_age'                    => $request['player_age'],
            'player_gender'                 => $request['player_gender'],
            'country_id'                    => $request['country_id'],
            'eu_passport_required'          => $request['eu_passport_required'],
            'player_main_position'          => json_encode($request['player_main_position']),
            'player_alternative_position'   => json_encode($request['player_alternative_position']),
            'transfer_fee'                  => $request['transfer_fee'],
            'monthly_salary'                => $request['monthly_salary'],
            'training_compensation_fee'     => $request['training_compensation_fee'],
            'trial_conditions'              => $request['trial_conditions'],
            'profile_type'                  => $request['profile_type'],
            'telephone'                     => $request['telephone'],
            'email'                         => $request['email'],
            'website'                       => $request['website'],
            'social_media_link'             => $request['social_media_link'],
            'additional_information'        => $request['additional_information']
        ]);

        if ($agent) {
            return redirect()->route('recommend-player.market-post-recommend-player')
                ->with('success', 'Recommend A Player updated successfully');
        } else {
            return redirect()->route('recommend-player.market-post-recommend-player')
                ->with('error', 'Something went wrong');
        }
    }

    // ********************************destroy Method ***********************************/
    public function destroy($id)
    {
        $agent = MarketRecommendPlayer::find($id);
        if (file_exists($agent->upload_logo)) {
            unlink($agent->upload_logo);
        }
        $agent->delete();
        return redirect()->route('recommend-player.market-post-recommend-player')
            ->with('success', 'Recommend A Player deleted successfully');
    }
}
