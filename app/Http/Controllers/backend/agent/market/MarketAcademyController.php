<?php

namespace App\Http\Controllers\backend\agent\market;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\MarketAcademy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketAcademyController extends Controller
{
    // ********************************index Method ***********************************/
    public function index()
    {
        $allAcademy = MarketAcademy::where('agent_id', Auth::id())->get();
        return view('backend.agent.market.academy.index', compact('allAcademy'));
    }

    // ********************************Create Method ***********************************/
    public function create()
    {
        $agent     = MarketAcademy::where('agent_id', Auth::id())->first();
        $countries = Country::all();
        $cities    = City::all();
        
        return view('backend.agent.market.academy.create', compact('agent', 'countries', 'cities'));
    }

    // ********************************store Method ***********************************/
    public function store(Request $request)
    {
        $request->validate([
            'expiry_date'             => ['required'],
            'for_whom'                => ['required'],
            'upload_logo'             => ['required'],
            'description'             => ['required'],
            'academy_name'            => ['required'],
            'city_id'                 => ['required'],
            'country_id'              => ['required'],
            'start_date'              => ['required'],
            'start_time'              => ['required'],
            'end_date'                => ['required'],
            'end_time'                => ['required'],
            'player_gender'           => ['required'],
            'player_position'         => ['required'],
            'player_min_age'          => ['required'],
            'player_max_age'          => ['required'],
            'profile_type'            => ['required'],
            'telephone'               => ['required'],
            'email'                   => ['required'],
            'website'                 => ['required'],
            'social_media_link'       => ['required'],
            'additional_information'  => ['required']
        ]);

        if ($request->hasFile('upload_logo')) {

            $imgName        = time() . '.' . $request->upload_logo->extension();
            $uploadLocation = "backend/images/agent/logo/";
            $request->upload_logo->move(public_path("backend/images/agent/logo/"), $imgName);
        }


        $agent = MarketAcademy::create([
            'agent_id'               => Auth::id(),
            'slug'                   => 'academy',
            'expiry_date'            => $request['expiry_date'],
            'for_whom'               => json_encode($request['for_whom']),
            'upload_logo'            => $uploadLocation . $imgName,
            'description'            => $request['description'],
            'academy_name'           => $request['academy_name'],
            'city_id'                => $request['city_id'],
            'country_id'             => $request['country_id'],
            'start_date'             => $request['start_date'],
            'start_time'             => $request['start_time'],
            'end_date'               => $request['end_date'],
            'end_time'               => $request['end_time'],
            'player_gender'          => $request['player_gender'],
            'player_position'        => json_encode($request['player_position']),
            'player_min_age'         => $request['player_min_age'],
            'player_max_age'         => $request['player_max_age'],
            'profile_type'           => $request['profile_type'],
            'telephone'              => $request['telephone'],
            'email'                  => $request['email'],
            'website'                => $request['website'],
            'social_media_link'      => $request['social_media_link'],
            'additional_information' => $request['additional_information']
        ]);

        if ($agent) {
            return redirect()->route('academy.market-post-academy')->with('success', 'Academy created successfully');
        } else {
            return redirect()->route('academy.market-post-academy')->with('error', 'Something went wrong');
        }
    }


    // ********************************Edit Method ***********************************/
    public function edit($id)
    {
        $agent            = MarketAcademy::find($id);
        $for_whom         = json_decode($agent->for_whom, true);
        $player_position  = json_decode($agent->player_position, true);
        $countries        = Country::all();
        $cities           = City::all();
        return view(
            'backend.agent.market.academy.edit',
            compact('agent', 'countries', 'cities', 'for_whom', 'player_position')
        );
    }

    // ********************************Update Method ***********************************/
    public function update(Request $request)
    {
        $request->validate([
            'expiry_date'             => ['required'],
            'for_whom'                => ['required'],
            'description'             => ['required'],
            'academy_name'            => ['required'],
            'city_id'                 => ['required'],
            'country_id'              => ['required'],
            'start_date'              => ['required'],
            'start_time'              => ['required'],
            'end_date'                => ['required'],
            'end_time'                => ['required'],
            'player_gender'           => ['required'],
            'player_position'         => ['required'],
            'player_min_age'          => ['required'],
            'player_max_age'          => ['required'],
            'profile_type'            => ['required'],
            'telephone'               => ['required'],
            'email'                   => ['required'],
            'website'                 => ['required'],
            'social_media_link'       => ['required'],
            'additional_information'  => ['required']
        ]);

        $oldLogo = MarketAcademy::find($request['cid']);
        if (file_exists($oldLogo->upload_logo)) {
            unlink($oldLogo->upload_logo);
        }

        if ($request->hasFile('upload_logo')) {
            $imgName        = time() . '.' . $request->upload_logo->extension();
            $uploadLocation = "backend/images/agent/logo/";
            $request->upload_logo->move(public_path("backend/images/agent/logo/"), $imgName);
            $image = $uploadLocation . $imgName;
        }

        $agent = MarketAcademy::where('id', $request['cid'])->update([
            'agent_id'               => Auth::id(),
            'slug'                   => 'academy',
            'expiry_date'            => $request['expiry_date'],
            'for_whom'               => json_encode($request['for_whom']),
            'upload_logo'            => $image ?? $oldLogo->upload_logo,
            'description'            => $request['description'],
            'academy_name'           => $request['academy_name'],
            'city_id'                => $request['city_id'],
            'country_id'             => $request['country_id'],
            'start_date'             => $request['start_date'],
            'start_time'             => $request['start_time'],
            'end_date'               => $request['end_date'],
            'end_time'               => $request['end_time'],
            'player_gender'          => $request['player_gender'],
            'player_position'        => json_encode($request['player_position']),
            'player_min_age'         => $request['player_min_age'],
            'player_max_age'         => $request['player_max_age'],
            'profile_type'           => $request['profile_type'],
            'telephone'              => $request['telephone'],
            'email'                  => $request['email'],
            'website'                => $request['website'],
            'social_media_link'      => $request['social_media_link'],
            'additional_information' => $request['additional_information']
        ]);

        if ($agent) {
            return redirect()->route('academy.market-post-academy')->with('success', 'Academy updated successfully');
        } else {
            return redirect()->route('academy.market-post-academy')->with('error', 'Something went wrong');
        }
    }

    // ********************************destroy Method ***********************************/
    public function destroy($id)
    {
        $agent = MarketAcademy::find($id);
        if (file_exists($agent->upload_logo)) {
            unlink($agent->upload_logo);
        }
        $agent->delete();
        return redirect()->route('academy.market-post-academy')->with('success', 'Academy deleted successfully');
    }
}
