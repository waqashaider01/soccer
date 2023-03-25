<?php

namespace App\Http\Controllers\backend\agent\market;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\MarketPartnershipRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarketPartnershipRequestController extends Controller
{

    // ********************************index Method ***********************************/
    public function index()
    {
        $partnershipRequests = MarketPartnershipRequest::where('agent_id', Auth::id())->get();
        return view('backend.agent.market.partnership-request.index', compact('partnershipRequests'));
    }

    // ********************************Create Method ***********************************/
    public function create()
    {
        $agent     = MarketPartnershipRequest::where('agent_id', Auth::id())->first();
        $countries = Country::all();
        $cities    = City::all();
        return view('backend.agent.market.partnership-request.create', compact('agent', 'countries', 'cities'));
    }

    // ********************************store Method ***********************************/
    public function store(Request $request)
    {
        $request->validate([
            'expiry_date'                          => ['required'],
            'for_whom'                             => ['required'],
            'upload_logo'                          => ['required'],
            'description'                          => ['required'],
            'originating_partner_country'          => ['required'],
            'prospective_partner'                  => ['required'],
            'prospective_partner_country'          => ['required'],
            'prospective_partner_country_wordwide' => ['required'],
            'profile_type'                         => ['required'],
            'telephone'                            => ['required'],
            'email'                                => ['required'],
            'website'                              => ['required'],
            'social_media_link'                    => ['required'],
            'additional_information'               => ['required']
        ]);

        if ($request->hasFile('upload_logo')) {
            $imgName        = time() . '.' . $request->upload_logo->extension();
            $uploadLocation = "backend/images/agent/logo/";
            $request->upload_logo->move(public_path("backend/images/agent/logo/"), $imgName);
        }

        $agent = MarketPartnershipRequest::create([
            'agent_id'                              => Auth::id(),
            'slug'                                  => 'partnership-request',
            'expiry_date'                           => $request['expiry_date'],
            'for_whom'                              => json_encode($request['for_whom']),
            'upload_logo'                           => $uploadLocation . $imgName,
            'description'                           => $request['description'],
            'originating_partner_country'           => $request['originating_partner_country'],
            'prospective_partner'                   => $request['prospective_partner'],
            'prospective_partner_country'           => $request['prospective_partner_country'],
            'prospective_partner_country_wordwide'  => $request['prospective_partner_country_wordwide'] == 'yes' ? 1 : 0,
            'profile_type'                          => $request['profile_type'],
            'telephone'                             => $request['telephone'],
            'email'                                 => $request['email'],
            'website'                               => $request['website'],
            'social_media_link'                     => $request['social_media_link'],
            'additional_information'                => $request['additional_information']
        ]);

        if ($agent) {
            return redirect()->route('partnership-request.market-post-partnership-request')->with('success', 'Campus created successfully');
        } else {
            return redirect()->route('partnership-request.market-post-partnership-request')->with('error', 'Something went wrong');
        }
    }

    // ********************************edit Method ***********************************/
    public function edit($id)
    {
        $agent           = MarketPartnershipRequest::find($id);
        $for_whom        = json_decode($agent->for_whom, true);
        $player_position = json_decode($agent->player_position, true);
        $countries       = Country::all();
        $cities          = City::all();
        return view(
            'backend.agent.market.partnership-request.edit',
            compact('agent', 'countries', 'cities', 'for_whom', 'player_position')
        );
    }

    // ********************************Update Method ***********************************/
    public function update(Request $request)
    {
        $request->validate([
            'expiry_date'                          => ['required'],
            'for_whom'                             => ['required'],
            'upload_logo'                          => ['required'],
            'description'                          => ['required'],
            'originating_partner_country'          => ['required'],
            'prospective_partner'                  => ['required'],
            'prospective_partner_country'          => ['required'],
            'prospective_partner_country_wordwide' => ['required'],
            'profile_type'                         => ['required'],
            'telephone'                            => ['required'],
            'email'                                => ['required'],
            'website'                              => ['required'],
            'social_media_link'                    => ['required'],
            'additional_information'               => ['required']
        ]);

        $oldLogo = MarketPartnershipRequest::find($request['cid']);
        if (file_exists($oldLogo->upload_logo)) {
            unlink($oldLogo->upload_logo);
        }

        if ($request->hasFile('upload_logo')) {
            $imgName = time() . '.' . $request->upload_logo->extension();
            $uploadLocation = "backend/images/agent/logo/";
            $request->upload_logo->move(public_path("backend/images/agent/logo/"), $imgName);
            $image = $uploadLocation . $imgName;
        }

        $agent = MarketPartnershipRequest::where('id', $request['cid'])->update([
            'agent_id'                              => Auth::id(),
            'slug'                                  => 'partnership-request',
            'expiry_date'                           => $request['expiry_date'],
            'for_whom'                              => json_encode($request['for_whom']),
            'upload_logo'                           => $uploadLocation . $imgName,
            'description'                           => $request['description'],
            'originating_partner_country'           => $request['originating_partner_country'],
            'prospective_partner'                   => $request['prospective_partner'],
            'prospective_partner_country'           => $request['prospective_partner_country'],
            'prospective_partner_country_wordwide'  => $request['prospective_partner_country_wordwide'] == 'yes' ? 1 : 0,
            'profile_type'                          => $request['profile_type'],
            'telephone'                             => $request['telephone'],
            'email'                                 => $request['email'],
            'website'                               => $request['website'],
            'social_media_link'                     => $request['social_media_link'],
            'additional_information'                => $request['additional_information']
        ]);

        if ($agent) {
            return redirect()->route('partnership-request.market-post-partnership-request')
                ->with('success', 'Partnership Request updated successfully');
        } else {
            return redirect()->route('partnership-request.market-post-partnership-request')
                ->with('error', 'Something went wrong');
        }
    }

    // ********************************destroy Method ***********************************/
    public function destroy($id)
    {
        $agent = MarketPartnershipRequest::find($id);
        if (file_exists($agent->upload_logo)) {
            unlink($agent->upload_logo);
        }
        $agent->delete();
        return redirect()->route('partnership-request.market-post-partnership-request')
            ->with('success', 'Partnership Request deleted successfully');
    }
}
