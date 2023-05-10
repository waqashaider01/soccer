<?php

namespace App\Http\Controllers\backend\agent;

use App\Models\City;
use App\Models\User;
use App\Models\Country;
use App\Models\ClubInfo;
use App\Models\Language;
use App\Models\CoachInfo;
use App\Models\Followers;
use App\Models\ScoutInfo;
use App\Models\AcademyInfo;
use Illuminate\Http\Request;
use App\Models\VerifyAccount;
use App\Models\IntermediaryInfo;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\UserPrivacy;
use App\Models\Mail_prefreneces_notification;
use App\Models\BlockedUsers;
use App\Models\Favourite;
use Illuminate\Support\Facades\Auth;
use App\Models\PlayerAttribute;
use App\Models\PlayerInfo;

class AgentController extends Controller
{
    public function index()
    {

        $user_id        =   Auth::user()->id;
        $follower       =   Followers::where('following', $user_id)->count();
        $following      =   Followers::where('follower', $user_id)->count();
        $views          =   ScoutInfo::where('scout_id', $user_id)->first();
        $id1            =   Auth::id();
        $user           =   User::where('id', $id1)->first();
        $follower       =   Followers::where('following', '=', $id1)->count();
        $following      =   Followers::where('follower', '=', $id1)->count();
        $favourites     =   Favourite::where('user_id', '=', $id1)->count();
        $views          =   ScoutInfo::where('scout_id', $id1)->first();
        $verified       =   VerifyAccount::where('user_id', Auth::user()->id)->get();
        $verifiedstyle  =   VerifyAccount::where('user_id', Auth::user()->id)->where('status', 1)->count();
        $agelimit       =   DB::table('guardian_approvals', Auth::user()->id)->where('status', NULL)->count();
        
        $profileimages = PlayerInfo::where('player_id', $id1)->whereNotNull('profile_img')->count();
        $attributess   = PlayerAttribute::where('player_id', $id1)->count();
        $city          = PlayerInfo::where('player_id', $id1)->whereNotNull("birth_city")->count();
        $country       = PlayerInfo::where('player_id', $id1)->whereNotNull('birth_country')->count();
        
        
        
        
        
        
        
        $verification  = VerifyAccount::where("user_id", $id1)->where('status', 1)->count();
        if (!$views) {
            $views = [];
        } 
        $verified       = VerifyAccount::where('user_id', Auth::user()->id)->get();
        
        return view("backend.agent.index", compact('favourites', 'user', 'views', 'follower', 'following', 'verifiedstyle','profileimages','attributess','city','country','verification','verified'));
    }

    /***************** My Network ************************************/
    public function myNetwork()
    {
        return view("backend.agent.my-network");
    }

    /***************** Notifications **********************************/
    public function notifications()
    {
        return view("backend.agent.notifications");
    }
    
    // *******************************************************************
    public function agentsetting()
    {
        $blockusers = [];
        $blockUser = BlockedUsers::where('user_id', Auth::user()->id)->pluck('blocked_id')->toArray();
        // dd($blockUser);
        $UserPrivacy = UserPrivacy::where('user_id',auth()->user()->id)->first();
        $mail_pref = Mail_prefreneces_notification::where('user_id', auth::id())->first();
        
         foreach ($blockUser as $blocked_id) {
            $blocks = User::find($blocked_id);
            if ($blocks) {
                $blockusers[] = $blocks;
            }
        }
        
        return view('backend.agentsetting',compact('mail_pref','UserPrivacy','blockusers'));
    }

    /***************** marketplace ************************************/
    public function marketPlace()
    {
        return view("backend.agent.messages");
    }
    /***************** messages ********************************/
    public function messages()
    {
        return view("backend.agent.messages");
    }

    /***************** activity ************************************/
    public function activity()
    {
        return view("backend.agent.activity");
    }

    // -------------------------------------------------

    // Profile Info Save
    public function personalInfoSave(Request $request)
    {
        $request->validate([
            'firstName' => ['required'],
            'lastName' => ['required'],
            'nationality' => ['required'],
            'licensed' => ['required'],
            'about_me' => ['required']
        ]);

        $user = User::find(Auth::id())->update([
            'name' => $request['firstName'] . " " . $request['lastName'],
        ]);

        if (Auth::user()->type == "scout") {

            $agent = ScoutInfo::where("scout_id", Auth::id())->update([
                'nationality'       => $request['nationality'],
                'licensed'          => $request['licensed'],
                'about_me'          => $request['about_me']
            ]);
        } elseif (Auth::user()->type == "club") {
            $agent = ClubInfo::where("club_id", Auth::id())->update([
                'nationality'    => $request['nationality'],
                'licensed'       => $request['licensed'],
                'about_me'       => $request['about_me']
            ]);
        } elseif (Auth::user()->type == "coach") {
            $agent = CoachInfo::where("coach_id", Auth::id())->update([
                'nationality' => $request['nationality'],
                'licensed' => $request['licensed'],
                'current_team' => $request['current_team'],
                'about_me' => $request['about_me']
            ]);
        } elseif (Auth::user()->type == "intermediary") {
            $agent = IntermediaryInfo::where("intermediary_id", Auth::id())->update([
                'nationality' => $request['nationality'],
                'licensed' => $request['licensed'],
                'about_me' => $request['about_me']
            ]);
        } elseif (Auth::user()->type == "academy") {
            $agent = AcademyInfo::where("academy_id", Auth::id())->update([
                'nationality' => $request['nationality'],
                'licensed' => $request['licensed'],
                'about_me' => $request['about_me']
            ]);
        }

        if ($user && $agent) {
            return redirect()->back()->with('success', 'Personal Info has been updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function basicInfoSave(Request $request)
    {
        if (Auth::user()->type == "scout") {
            $request->validate([
                'organization_name' => ['required'],
                'position_at_organization' => ['required'],
                'scout_nationality' => ['required'],
                'countries_of_operation' => ['required'],
                'countries_of_operation_worldwide' => ['required'],
                'profile_link' => ['required'],
            ]);

            $agent = ScoutInfo::where("scout_id", Auth::id())->update([
                'organization_name' => $request['organization_name'],
                'position_at_organization' => $request['position_at_organization'],
                'scout_nationality' => $request['scout_nationality'],
                'countries_of_operation' => $request['countries_of_operation'],
                'countries_of_operation_worldwide' => $request['countries_of_operation_worldwide'] == "on" ? 1 : 0,
                'profile_link' => $request['profile_link'],
            ]);
        } elseif (Auth::user()->type == "club") {
            $request->validate([
                'club_name' => ['required'],
                'position_at_club' => ['required'],
                'club_nationality' => ['required'],
                'countries_of_operation' => ['required'],
                'countries_of_operation_worldwide' => ['required'],
                'profile_link' => ['required'],
            ]);

            $agent = ClubInfo::where("club_id", Auth::id())->update([
                'club_name' => $request['club_name'],
                'position_at_club' => $request['position_at_club'],
                'club_nationality' => $request['club_nationality'],
                'countries_of_operation' => $request['countries_of_operation'],
                'countries_of_operation_worldwide' => $request['countries_of_operation_worldwide'] == "on" ? 1 : 0,
                'profile_link' => $request['profile_link'],
            ]);
        } elseif (Auth::user()->type == "coach") {
            $request->validate([
                'organization_name' => ['required'],
                'position_at_organization' => ['required'],
                'coach_nationality' => ['required'],
                'countries_of_operation' => ['required'],
                'countries_of_operation_worldwide' => ['required'],
                'profile_link' => ['required'],
            ]);

            $agent = CoachInfo::where("coach_id", Auth::id())->update([
                'organization_name' => $request['organization_name'],
                'position_at_organization' => $request['position_at_organization'],
                'coach_nationality' => $request['coach_nationality'],
                'countries_of_operation' => $request['countries_of_operation'],
                'countries_of_operation_worldwide' => $request['countries_of_operation_worldwide'] == "on" ? 1 : 0,
                'profile_link' => $request['profile_link'],
            ]);
        } elseif (Auth::user()->type == "intermediary") {
            $request->validate([
                'agency_name' => ['required'],
                'position_at_agency' => ['required'],
                'intermediary_nationality' => ['required'],
                'countries_of_operation' => ['required'],
                'countries_of_operation_worldwide' => ['required'],
                'profile_link' => ['required'],
            ]);

            $agent = IntermediaryInfo::where("intermediary_id", Auth::id())->update([
                'agency_name' => $request['agency_name'],
                'position_at_agency' => $request['position_at_agency'],
                'intermediary_nationality' => $request['intermediary_nationality'],
                'countries_of_operation' => $request['countries_of_operation'],
                'countries_of_operation_worldwide' => $request['countries_of_operation_worldwide'] == "on" ? 1 : 0,
                'profile_link' => $request['profile_link'],
            ]);
        } elseif (Auth::user()->type == "academy") {
            $request->validate([
                'academy_name' => ['required'],
                'position_at_academy' => ['required'],
                'academy_nationality' => ['required'],
                'countries_of_operation' => ['required'],
                'countries_of_operation_worldwide' => ['required'],
                'profile_link' => ['required'],
            ]);

            $agent = AcademyInfo::where("academy_id", Auth::id())->update([
                'academy_name' => $request['academy_name'],
                'position_at_academy' => $request['position_at_academy'],
                'academy_nationality' => $request['academy_nationality'],
                'countries_of_operation' => $request['countries_of_operation'],
                'countries_of_operation_worldwide' => $request['countries_of_operation_worldwide'] == "on" ? 1 : 0,
                'profile_link' => $request['profile_link'],
            ]);
        }

        if ($agent) {
            return redirect()->back()->with('success', 'Basic Info has been updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function contactInfoSave(Request $request)
    {
        $request->validate([
            'profile_type' => ['required'],
            'telephone' => ['required'],
            'email' => ['required'],
            'social_media_link_1' => ['required'],
            'social_media_link_2' => ['required'],
            'social_media_link_3' => ['required'],
            'website' => ['required'],
            'birth_city' => ['required'],
            'state' => ['required'],
            'birth_country' => ['required'],
        ]);

        // check which agent is login
        if (Auth::user()->type == "scout") {
            $agent = ScoutInfo::where("scout_id", Auth::id());
        } elseif (Auth::user()->type == "club") {
            $agent = ClubInfo::where("club_id", Auth::id());
        } elseif (Auth::user()->type == "coach") {
            $agent = CoachInfo::where("coach_id", Auth::id());
        } elseif (Auth::user()->type == "intermediary") {
            $agent = IntermediaryInfo::where("intermediary_id", Auth::id());
        } elseif (Auth::user()->type == "academy") {
            $agent = AcademyInfo::where("academy_id", Auth::id());
        }

        $agent = $agent->update([
            'profile_type' => $request['profile_type'],
            'telephone' => $request['telephone'],
            'email' => $request['email'],
            'social_media_link_1' => $request['social_media_link_1'],
            'social_media_link_2' => $request['social_media_link_2'],
            'social_media_link_3' => $request['social_media_link_3'],
            'website' => $request['website'],
            'birth_city' => $request['birth_city'],
            'state' => $request['state'],
            'birth_country' => $request['birth_country'],
        ]);

        if ($agent) {
            return redirect()->back()->with('success', 'Contact Info has been updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function coverImgSave(Request $request)
    {
        $request->validate([
            'coverImage' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        // remove previous image
        if ($request->oldImage) {
            unlink($request->oldImage);
        }

        //upload image
        $imgName = time() . '.' . $request->coverImage->extension();
        $uploadLocation = "backend/images/agent/cover/";
        $request->coverImage->move(public_path("backend/images/agent/cover/"), $imgName);

        // check which agent is login
        if (Auth::user()->type == "scout") {
            $agent = ScoutInfo::where("scout_id", Auth::id());
        } elseif (Auth::user()->type == "club") {
            $agent = ClubInfo::where("club_id", Auth::id());
        } elseif (Auth::user()->type == "coach") {
            $agent = CoachInfo::where("coach_id", Auth::id());
        } elseif (Auth::user()->type == "intermediary") {
            $agent = IntermediaryInfo::where("intermediary_id", Auth::id());
        } elseif (Auth::user()->type == "academy") {
            $agent = AcademyInfo::where("academy_id", Auth::id());
        }

        $agent = $agent->update(['cover_img' => $uploadLocation . $imgName]);

        if ($agent) {
            return redirect()->back()->with("success", "Cover Image has been updated successfully!");
        }
    }

    public function profileImgSave(Request $request)
    {
        $request->validate([
            'profileImage' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
        ]);

        // remove previous image
        if ($request->oldImage) {
            unlink($request->oldImage);
        }

        //upload image
        $imgName = time() . '.' . $request->profileImage->extension();
        $uploadLocation = "backend/images/agent/profile/";
        $request->profileImage->move(public_path("backend/images/agent/profile/"), $imgName);

        // check which agent is login
        if (Auth::user()->type == "scout") {
            $agent = ScoutInfo::where("scout_id", Auth::id());
        } elseif (Auth::user()->type == "club") {
            $agent = ClubInfo::where("club_id", Auth::id());
        } elseif (Auth::user()->type == "coach") {
            $agent = CoachInfo::where("coach_id", Auth::id());
        } elseif (Auth::user()->type == "intermediary") {
            $agent = IntermediaryInfo::where("intermediary_id", Auth::id());
        } elseif (Auth::user()->type == "academy") {
            $agent = AcademyInfo::where("academy_id", Auth::id());
        }

        $agent = $agent->update(['profile_img' => $uploadLocation . $imgName]);

        if ($agent) {
            return redirect()->back()->with("success", "Profile Image has been updated successfully!");
        }
    }
}
