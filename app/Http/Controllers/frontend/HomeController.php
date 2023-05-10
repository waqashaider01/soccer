<?php

namespace App\Http\Controllers\frontend;

use App\Mail\Invitation_mail;
use Hash;
use App\Models\FAQ;
use App\Models\Subscription;

use App\Models\Sub;
use App\Models\Blog;
use App\Models\City;
use App\Models\User;
use App\Models\Terms;
use App\Mail\DemoMail;
use App\Models\AboutUs;
use App\Models\Country;
use App\Models\Pricing;
use App\Models\privacy;
use App\Mail\NotifyMail;
use App\Models\ClubInfo;
use App\Models\CoachInfo;
use App\Models\ContactUs;
use App\Models\Followers;
use App\Models\ScoutInfo;
use App\Models\MarketClub;
use App\Models\PlayerInfo;
use App\Models\sendMailOn;
use App\Models\AcademyInfo;
use App\Models\MarketApply;
use App\Models\MarketTrial;
use App\Models\UserPrivacy;
use App\Mail\MailsContactUs;
use App\Models\BlockedUsers;
use App\Models\HelpQuestion;
use App\Models\MarketCampus;
// use App\Models\notification;
use Illuminate\Http\Request;
use App\Models\MarketAcademy;
use App\Models\VerifyAccount;
use App\Models\Feature_update;
use App\Models\TransferHistory;
use App\Models\AgentAchievement;
use App\Models\GuardianApproval;
use App\Models\IntermediaryInfo;
use App\Models\PlayersPortfolio;
use Illuminate\Support\Facades\DB;
use App\Models\MarketRequestPlayer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\MarketRecommendPlayer;
use Illuminate\Contracts\Mail\Mailable;
use App\Mail\ContactUs as MailContactUs;
use App\Models\Favourite;
use App\Models\Invitation;
use App\Models\MarketPartnershipRequest;
use App\Models\Mail_prefreneces_notification;
use App\Models\SharePost;
use App\Models\AccVerification;
use App\Models\PaymentCardInfo;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{

    //===================================================
    public function index()
    {
        return view('welcome');
    }

    //===================================================
    public function aboutUs()
    {
        $privacy = AboutUs::all();
        // dd($privacy);
        foreach ($privacy as $pree) {
            $preee1 = $pree->partA;

            $preee2 = $pree->partB;
            $preee3 = $pree->partC;
            $date  = $pree->updated_at;
        }
        return view('frontend.about-us', compact('date', 'preee1', 'preee2', 'preee3'));
    }

    //===================================================
    public function terms()
    {
        $terms = Terms::all();
        foreach ($terms as $termss) {
            $term = $termss->terms_conditions;
            $date  = $termss->updated_at;
        }
        return view('frontend.terms-conditions', compact('term', 'date'));
    }

    //===================================================
    public function help()
    {
        $generls   = HelpQuestion::where('category', 'general')->get();
        // dd($generls);
        $players  = HelpQuestion::where('category', 'players')->get();
        $agents   = HelpQuestion::where('category', 'agents')->get();
        $acadmies = HelpQuestion::where('category', 'acadmies')->get();
        return view('frontend.help', compact('generls', 'players', 'agents', 'acadmies'));
    }
    //===================================================
    public function privacyPolicy()
    {
        $privacy = privacy::all();
        foreach ($privacy as $pree) {
            $preee = $pree->privacy_policy;
            $date  = $pree->updated_at;
        }

        return view('frontend.privacy-policy', compact('privacy', 'date', 'preee'));
    }


    //===================================================
    public function contactUs()
    {

        return view('frontend.contact-us');
    }
    //===================================================
    public function feedback()
    {
        return view('frontend.feedback');
    }
    //===================================================
    public function press()
    {
        return view('frontend.press');
    }

    // ===================================================
    public function faqs()
    {
        $faqs = FAQ::all();
        return view('frontend.faqs', compact('faqs'));
    }

    // ===================================================
    public function mailpref(Request $request)
    {

        $auth = Auth::id();
        $user = sendMailOn::where('user_id', '=', $auth)->first();

        if ($user === null) {
            $data = new sendMailOn();
            $data->user_id = Auth::id();
            $data->new_follower = $request->new_follower;
            $data->invite_refral = $request->invite_refral;
            $data->save();
        } else {
            $id = Auth::id();
            $student = sendMailOn::find($id);
            $student->new_follower = $request->new_follower;
            $student->invite_refral = $request->invite_refral;
            $student->update();
        }

        return redirect()->back()->with('status', 'Added Successfully');
    }


    // ===================================================
    public function agents(Request $request)
    {

        $countries      = Country::all();
        $scouts         = ScoutInfo::select('scout_id')->get();
        $coaches        = CoachInfo::select('coach_id')->get();
        $intermediaries = IntermediaryInfo::select('intermediary_id')->get();
        $clubs          = ClubInfo::select('club_id')->get();
        $academies      = AcademyInfo::select('academy_id')->get();
        if ($request->has('type')) {
            $agents = User::query()
                ->where('type', '!=', 'player')
                ->whereIn('id', $scouts)
                ->orWhereIn('id', $coaches)
                ->orWhereIn('id', $intermediaries)
                ->orWhereIn('id', $clubs)
                ->orWhereIn('id', $academies)->where('type', $request->type)
                ->paginate(10);
        } elseif ($request->has('name')) {

            $agents = User::query()
                ->where('type', '!=', 'player')
                ->whereIn('id', $scouts)
                ->orWhereIn('id', $coaches)
                ->orWhereIn('id', $intermediaries)
                ->orWhereIn('id', $clubs)
                ->orWhereIn('id', $academies)->where('name', 'like', '%' . $request->name . '%')
                ->paginate(10);
        } else {
            $agents = User::query()
                ->where('type', '!=', 'player')
                ->whereIn('id', $scouts)
                ->orWhereIn('id', $coaches)
                ->orWhereIn('id', $intermediaries)
                ->orWhereIn('id', $clubs)
                ->orWhereIn('id', $academies)
                ->paginate(10);
        }

        foreach ($agents as $agent) {
            foreach ($countries as $country) {
                if ($agent->type == 'scout') {
                    $scout = ScoutInfo::where('scout_id', $agent->id)->first();
                    if ($scout->birth_country == $country->id) {
                        $agent->country = $country->name;
                    }
                    $agent->profile_img = $scout->profile_img;
                    $agent->reads = $scout->reads;
                } elseif ($agent->type == 'coach') {
                    $coach = CoachInfo::where('coach_id', $agent->id)->first();
                    if ($coach->birth_country == $country->id) {
                        $agent->country = $country->name;
                    }
                    $agent->profile_img = $coach->profile_img;
                    $agent->reads = $coach->reads;
                } elseif ($agent->type == 'intermediary') {
                    $intermediary = IntermediaryInfo::where('intermediary_id', $agent->id)->first();
                    if ($intermediary->birth_country == $country->id) {
                        $agent->country = $country->name;
                    }
                    $agent->profile_img = $intermediary->profile_img;
                    $agent->reads = $intermediary->reads;
                } elseif ($agent->type == 'club') {
                    $club = ClubInfo::where('club_id', $agent->id)->first();
                    if ($club->birth_country == $country->id) {
                        $agent->country = $country->name;
                    }
                    $agent->profile_img = $club->profile_img;
                    $agent->reads = $club->reads;
                } elseif ($agent->type == 'academy') {
                    $academy = AcademyInfo::where('academy_id', $agent->id)->first();
                    if ($academy->birth_country == $country->id) {
                        $agent->country = $country->name;
                    }
                    $agent->profile_img = $academy->profile_img;
                    $agent->reads = $academy->reads;
                }
            }
        }
        return view("frontend.agents", compact('agents', 'countries'));
    }

    //===================================================
    public function viewProfile($type, $id)
    {

        $followingstatus = 0;
        $msgstatus       = 0;
        $iddd            = Auth::id();
        $followstatus    = Followers::select('id')->where('follower', $iddd)->where('following', $id)->get();

        if (is_null($followstatus)) {
            $followingstatus = 0;
        } else {
            $followingstatus = 1;
        }

        $msgstatus = BlockedUsers::select('id')->where('user_id', $iddd)->where('blocked_id', $id)->get();

        if (is_null($msgstatus)) {
            $msgs = 0;
        } else {
            $msgs = 1;
        }

        $cities           = City::all();
        $user             = Followers::all();
        $countries        = Country::all();
        $achievements     = AgentAchievement::where('agent_id', $id)->get();
        $playersPortfolio = PlayersPortfolio::where("agent_id", $id)->get();
        $transferHistory  = TransferHistory::where("agent_id", $id)->get();

        foreach ($playersPortfolio as $portfolio) {
            $portfolio->profile_img = PlayerInfo::where('player_id', $portfolio->player_id)->first()->profile_img;
        }

        if ($type == "scout") {
            $agent = ScoutInfo::join('users', 'users.id', '=', 'scout_infos.scout_id')
            ->join('countries', 'countries.id', '=', 'scout_infos.birth_country')
            ->select('scout_infos.*', 'users.name', 'countries.name as country_name')
            ->where('scout_infos.scout_id', $id)
            ->first();

            if (!$agent) {
                // handle the case when $agent is null
                $read = 1;
            } else {
                $agent->reads++;
                $agent->save();
                $read = $agent->reads;
            }

        } elseif ($type == "club") {
            $agent = ClubInfo::join('users', 'users.id', '=', 'club_infos.club_id')
                ->join('countries', 'countries.id', '=', 'club_infos.birth_country')
                ->select('club_infos.*', 'users.name', 'countries.name as country_name')
                ->where('club_infos.club_id', $id)
                ->first();
                
                try {
                    if ($agent) {
                        $agent->reads++;
                        $agent->save();
                    } else {
                        throw new Exception('ClubInfo is null');
                    }
                } catch (Exception $e) {
                    Log::error($e->getMessage());
}
        } elseif ($type == "coach") {
            $agent = CoachInfo::join('users', 'users.id', '=', 'coach_infos.coach_id')
                ->join('countries', 'countries.id', '=', 'coach_infos.birth_country')
                ->select('coach_infos.*', 'users.name', 'countries.name as country_name')
                ->where('coach_infos.coach_id', $id)
                ->first();
            $agent->reads++;
            $agent->save();
        } elseif ($type == "intermediary") {
            $agent = IntermediaryInfo::join('users', 'users.id', '=', 'intermediary_infos.intermediary_id')
            ->join('countries', 'countries.id', '=', 'intermediary_infos.birth_country')
            ->select('intermediary_infos.*', 'users.name', 'countries.name as country_name')
            ->where('intermediary_infos.intermediary_id', $id)
            ->first();
            if ($agent) {
                $agent->reads++;
                $agent->save();
            }

        } elseif ($type == "academy") {
            $agent = AcademyInfo::join('users', 'users.id', '=', 'academy_infos.academy_id')
                ->join('countries', 'countries.id', '=', 'academy_infos.birth_country')
                ->select('academy_infos.*', 'users.name', 'countries.name as country_name')
                ->where('academy_infos.academy_id', $id)
                ->first();
            $agent->reads++;
            $agent->save();
        }
        return view(
            "frontend.profile.agent",
            compact(
                'agent',
                'cities',
                'achievements',
                'countries',
                'playersPortfolio',
                'transferHistory',
                'user',
                'id',
                'followingstatus',
                'followstatus',
                'msgstatus'
            )
        );
    }


    //===================================================
    public function market(Request $request)
    {
        // $applications = MarketApply::all()->count();
        $countries           = Country::all();
        $cities              = City::all();
        $applications        = MarketApply::all();
        $academies           = MarketAcademy::all();
        $camps               = MarketCampus::all();
        $clubs               = MarketClub::all();
        $partnershipRequests = MarketPartnershipRequest::all();
        $recommendPlayers    = MarketRecommendPlayer::all();
        $requestPlayers      = MarketRequestPlayer::all();
        $trials              = MarketTrial::all();

        if ($request->has('type')) {
            $academies           = $academies->where('slug', $request['type']);
            $camps               = $camps->where('slug', $request['type']);
            $clubs               = $clubs->where('slug', $request['type']);
            $partnershipRequests = $partnershipRequests->where('slug', $request['type']);
            $recommendPlayers    = $recommendPlayers->where('slug', $request['type']);
            $requestPlayers      = $requestPlayers->where('slug', $request['type']);
            $trials              = $trials->where('slug', $request['type']);
        } elseif ($request->has('sort-by' == 'newset')) {
            $academies           = $academies->orderBy('created_at', 'desc');
            $camps               = $camps->orderBy('created_at', 'desc');
            $clubs               = $clubs->orderBy('created_at', 'desc');
            $partnershipRequests = $partnershipRequests->orderBy('created_at', 'desc');
            $recommendPlayers    = $recommendPlayers->orderBy('created_at', 'desc');
            $requestPlayers      = $requestPlayers->orderBy('created_at', 'desc');
            $trials = $trials->orderBy('created_at', 'desc');
        } elseif ($request->has('sort-by' == 'oldest')) {
            $academies            = $academies->orderBy('created_at', 'asc');
            $camps                = $camps->orderBy('created_at', 'asc');
            $clubs                = $clubs->orderBy('created_at', 'asc');
            $partnershipRequests  = $partnershipRequests->orderBy('created_at', 'asc');
            $recommendPlayers     = $recommendPlayers->orderBy('created_at', 'asc');
            $requestPlayers       = $requestPlayers->orderBy('created_at', 'asc');
            $trials               = $trials->orderBy('created_at', 'asc');
        } elseif ($request->has('country')) {
            $academies            = $academies->where('country_id', $request['country']);
            $camps                = $camps->where('country_id', $request['country']);
            $clubs                = $clubs->where('country_id', $request['country']);
            $partnershipRequests  = $partnershipRequests->where('originating_partner_country', $request['country']);
            $recommendPlayers     = $recommendPlayers->where('country_id', $request['country']);
            $requestPlayers       = $requestPlayers->where('country_id', $request['country']);
            $trials = $trials->where('country_id', $request['country']);
        }
        return view(
            "frontend.market",
            compact(
                'countries',
                'cities',
                'academies',
                'camps',
                'clubs',
                'partnershipRequests',
                'recommendPlayers',
                'requestPlayers',
                'trials',
                'applications'
            )
        );
    }

    //===================================================
    public function marketDetail($slug, $id)
    {
        $cities         = City::all();
        $countries      = Country::all();
        $alreadyApplied = MarketApply::where('player_id', Auth::id())->where('market_id', $id)
            ->where('market_type', $slug)->first();

        if ($slug == "academy") {
            $agent = MarketAcademy::join('users', 'users.id', '=', 'market_academies.agent_id')
                ->join('countries', 'countries.id', '=', 'market_academies.country_id')
                ->select('market_academies.*', 'users.name', 'countries.name as country_name')
                ->where('market_academies.id', $id)
                ->first();
            return view("frontend.market-detail.academy", compact('agent', 'cities', 'countries', 'alreadyApplied'));
        } elseif ($slug == "camps") {
            $agent = MarketCampus::join('users', 'users.id', '=', 'market_campuses.agent_id')
                ->join('countries', 'countries.id', '=', 'market_campuses.country_id')
                ->select('market_campuses.*', 'users.name', 'countries.name as country_name')
                ->where('market_campuses.id', $id)
                ->first();
            return view("frontend.market-detail.camps", compact('agent', 'cities', 'countries', 'alreadyApplied'));
        } elseif ($slug == "club-seeking-player") {
            $agent = MarketClub::join('users', 'users.id', '=', 'market_clubs.agent_id')
                ->join('countries', 'countries.id', '=', 'market_clubs.country_id')
                ->select('market_clubs.*', 'users.name', 'countries.name as country_name')
                ->where('market_clubs.id', $id)
                ->first();
            return view("frontend.market-detail.club-seeking-player", compact('agent', 'cities', 'countries', 'alreadyApplied'));
        } elseif ($slug == "recommend-a-player") {
            $agent = MarketRecommendPlayer::join('users', 'users.id', '=', 'market_recommend_players.agent_id')
                ->join('countries', 'countries.id', '=', 'market_recommend_players.country_id')
                ->select('market_recommend_players.*', 'users.name', 'countries.name as country_name')
                ->where('market_recommend_players.id', $id)
                ->first();
            // $agent->incrementReadCount();
            return view("frontend.market-detail.recommend-a-player", compact('agent', 'cities', 'countries', 'alreadyApplied'));
        } elseif ($slug == "partnership-request") {
            $agent = MarketPartnershipRequest::join('users', 'users.id', '=', 'market_partnership_requests.agent_id')
                ->select('market_partnership_requests.*', 'users.name')
                ->where('market_partnership_requests.id', $id)
                ->first();
            // $agent->incrementReadCount();
            return view("frontend.market-detail.partnership-request", compact('agent', 'countries', 'alreadyApplied'));
        } elseif ($slug == "request-a-player") {
            $agent = MarketRequestPlayer::join('users', 'users.id', '=', 'market_request_players.agent_id')
                ->join('countries', 'countries.id', '=', 'market_request_players.country_id')
                ->select('market_request_players.*', 'users.name', 'countries.name as country_name')
                ->where('market_request_players.id', $id)
                ->first();
            // $agent->incrementReadCount();
            return view("frontend.market-detail.request-a-player", compact('agent', 'cities', 'countries', 'alreadyApplied'));
        } elseif ($slug == "trials") {
            $agent = MarketTrial::join('users', 'users.id', '=', 'market_trials.agent_id')
                ->join('countries', 'countries.id', '=', 'market_trials.country_id')
                ->select('market_trials.*', 'users.name', 'countries.name as country_name')
                ->where('market_trials.id', $id)
                ->first();
            // $agent->incrementReadCount();
            return view("frontend.market-detail.trials", compact('agent', 'cities', 'countries', 'alreadyApplied'));
        }
    }

    //===================================================
    public function pricing()
    {
        $pricing = Sub::where('status', '=', '1')->get();
        $feature = Feature_update::all();
        return view("frontend.pricing", compact("pricing", "feature"));
    }


    //===================================================
    public function favorite()
    {
        return view('frontend.favorite');
    }
    public function blog()
    {
        $blogs = Blog::paginate(10);
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(2)->get();
        return view("frontend.blog", compact('blogs', 'recentBlogs'));
    }


    //===================================================
    public function blogDetails($id)
    {
        $blog = Blog::find($id);
        $blog->incrementReadCount();
        $shareCount = SharePost::find($id);
        $recentBlogs = Blog::orderBy('created_at', 'desc')->take(2)->get();
        return view("frontend.blog-detail", compact('blog', 'recentBlogs', 'shareCount'));
    }

    //===================================================
    public function adminset()
    {
        $subs = Sub::all();

        // $block = BlockedUsers::where('user_id',auth()->user()->id)
        // ->pluck('blocked_id')
        // ->toArray();
        // $blocked_users = [];
        // foreach($block as $user){
        //     $users = User::find($user);
        //     $blocked_users[] = $users;
        // }
        
        $blocked_users = User::where('status','blocked')->get();
        $editsub = [];
        $UserPrivacy = UserPrivacy::where('user_id',auth()->user()->id)->first();
        // $data = AccVerification::firstOrFail();
        return view("backend.adminsetting", compact('subs', 'editsub','blocked_users','UserPrivacy'));
    }


    //===================================================
    public function playerset()
    {

        $UserPrivacy = UserPrivacy::where('user_id',auth()->user()->id)->first();
        $userinfo = VerifyAccount::where('user_id', Auth::user()->id)->get();
        $blockUser = BlockedUsers::where('user_id', Auth::user()->id)->pluck('blocked_id')->toArray();

        // dd($blockUser);
        $blockusers = [];
        $msgstatus = "";
        $blockadmin = 0;
        $times =0;
        $plans_months_check =0;
        $price=0;
        $invoice =0;
        $AuthId = Auth::id();
        $id = Auth::id();
        $user = User::find($id);
        if ($user->status == "blocked")
                $blockadmin = 1;

        foreach ($blockUser as $blocked_id) {
            $blocks = User::find($blocked_id);
            if ($blocks) {
                $blockusers[] = $blocks;
            }
        }
        $subs = Sub::all();

        $subscriptions = Subscription::where('user_id',Auth::user()->id)
        ->with('billing_address')
        ->get();
        $billing_addresses = $subscriptions->pluck('billing_address')->filter();
        $mail_pref = Mail_prefreneces_notification::where('user_id', Auth::id())->first();
        $invoices = Subscription::where('user_id',$AuthId)
                    ->where('status','active')
                    ->get();
      
       if(count($invoices) > 0){
           $invoice =   $invoices[0]->one_payment_of / $invoices[0]->recurring_amount;
            $price=$invoices[0]->one_payment_of/$invoice;
            $plans_months_check =Sub::where('price',$price)->pluck('duration')->first();
            $times = $plans_months_check / $invoice;
      }
 
        $card_details = PaymentCardInfo::where('user_id',Auth::user()->id)->get();
        return view("backend.playersetting", compact('UserPrivacy', 'blockadmin', 'user','times','invoice','msgstatus','mail_pref', 'subs', 'blockusers', 'userinfo','subscriptions','billing_addresses','invoices','card_details'));
    }

    //===================================================
    //===================================================
    public function invite()
    {
        $invite_count = Invitation::where("user_id", Auth::id())->count();
        $invite=Invitation::where("user_id",Auth::id())->pluck('email')->toArray();
        $invitefriend=0;
        $friends = [];
        foreach($invite as $item)
        {
          $users=User::where('email',$item)->first();
            if($users)
             {
               $invitefriend+=1;
               $friends[]=$users;
             }
        }
        $all_invitations=[];
        $all_invitations = Invitation::where('user_id', Auth::user()->id)->get();
        return view("backend.invite", compact('invite_count','invitefriend','all_invitations','friends'))->with('success', 'invitation sent successfully');
    }
    //==============================================
    public function invited(Request $request, $id)
    {
        if ($request->email == null) {
            return redirect()->back()->with('success', 'email should not be null');
        }
        
         $invite=Invitation::all();
        foreach($invite as $invit)
        {
        if($invit->email==$request->email)
            {
        return redirect()->back();
            }
        }
        
        $invite_model = Invitation::where('user_id', $id)->first();
        $users = Invitation::where('user_id', $id)->pluck('email')->toArray();

        if ($invite_model) {
            foreach ($users as $user) {
                if ($user == $request->email) {
                    return redirect()->back()->with('success', "User invitated already by You!");
                } else {
                    $user = Invitation::create([
                        'user_id' => $id,
                        "email"   => $request->email,
                        "status" => 'sent',
                    ]);
                    Mail::to($request->email)->send(new Invitation_mail());
                    return redirect()->back()->with('success', "Invitation sent successfully");
                }
            }
        } else {
            $user = Invitation::create([
                'user_id' => $id,
                "email"   => $request->email,
                "status" => 'sent',
            ]);
            Mail::to($request->email)->send(new Invitation_mail());
            return redirect()->back()->with('success', 'invitation sent successfully');
        }
    }

    // ===================================================
    public function changepas(request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password'  => 'required',
            'new-password'      => 'required|string|min:8|confirmed',
        ]);
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success", "Password successfully changed!");
    }
    
    
    
    public function adminpas(Request $request)

    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords do not match
            return redirect()->back()->with("error", "Your current password does not match with the password.");
        } else {
            // The passwords match
            $validatedData = $request->validate([
                'current-password'  => 'required',
                'new-password'      => 'required|string|min:8|confirmed',
            ]);
            $user = Auth::user();
            $user->password = bcrypt($request->get('new-password'));
            $user->save();
            return redirect()->back()->with("message", "Password successfully changed!");
        }
    }


    //===================================================
    public function security(Request $request, $id)
    {
        $UserPrivacy = UserPrivacy::where('user_id',$id)->first();
        if(!$UserPrivacy)
        {
            $UserPrivacy=new UserPrivacy;
            
        }
        // Telephone
        if ($request->telephone == "everyone") {
            $UserPrivacy->telephone = 0;
        } elseif ($request->telephone == "only_contact") {
            $UserPrivacy->telephone = 2;
        } elseif ($request->telephone == "only_share_with") {
            $UserPrivacy->telephone = 3;
        } elseif ($request->telephone == "only_me") {
            $UserPrivacy->telephone = 1;
        }

        // email
        if ($request->email == "everyone") {
            $UserPrivacy->email = 0;
        } if ($request->email == "only_contact") {
            $UserPrivacy->email = 2;
        } if ($request->email == "only_share_with") {
            $UserPrivacy->email = 3;
        } elseif ($request->email == "only_me") {
            $UserPrivacy->email = 1;
        }

        // website
        if ($request->website == "everyone") {
            $UserPrivacy->website = 0;
        } elseif ($request->website == "only_contact") {
            $UserPrivacy->website = 2;
        } elseif ($request->website == "only_share_with") {
            $UserPrivacy->website = 3;
        } elseif ($request->website == "only_me") {
            $UserPrivacy->website = 1;
        }

        // social
        if ($request->social_media_links == "everyone") {
            $UserPrivacy->social_media_links = 0;
        } elseif ($request->social_media_links == "only_contact") {
            $UserPrivacy->social_media_links = 2;
        } elseif ($request->social_media_links == "only_share_with") {
            $UserPrivacy->social_media_links = 3;
        } elseif ($request->social_media_links == "only_me") {
            $UserPrivacy->social_media_links = 1;
        }
        $UserPrivacy->user_id =Auth::id();
        $UserPrivacy->save();
        return redirect()->back()->with('message', 'Setting Updated!');
    }
    
    
    public function adminsecurity(Request $request, $id)
    {

        $UserPrivacy = UserPrivacy::where('user_id',$id)->first();
        if ($request->telephone == "everyone") {
            $UserPrivacy->telephone = 0;
        } elseif ($request->telephone == "only_contact") {
            $UserPrivacy->telephone = 2;
        } elseif ($request->telephone == "only_share_with") {
            $UserPrivacy->telephone = 3;
        } elseif ($request->telephone == "only_me") {
            $UserPrivacy->telephone = 1;
        }

        // email
        if ($request->email == "everyone") {
            $UserPrivacy->email = 0;
        } if ($request->email == "only_contact") {
            $UserPrivacy->email = 2;
        } if ($request->email == "only_share_with") {
            $UserPrivacy->email = 3;
        } elseif ($request->email == "only_me") {
            $UserPrivacy->email = 1;
        }

        // website
        if ($request->website == "everyone") {
            $UserPrivacy->website = 0;
        } elseif ($request->website == "only_contact") {
            $UserPrivacy->website = 2;
        } elseif ($request->website == "only_share_with") {
            $UserPrivacy->website = 3;
        } elseif ($request->website == "only_me") {
            $UserPrivacy->website = 1;
        }

        // social
        if ($request->social_media_links == "everyone") {
            $UserPrivacy->social_media_links = 0;
        } elseif ($request->social_media_links == "only_contact") {
            $UserPrivacy->social_media_links = 2;
        } elseif ($request->social_media_links == "only_share_with") {
            $UserPrivacy->social_media_links = 3;
        } elseif ($request->social_media_links == "only_me") {
            $UserPrivacy->social_media_links = 1;
        }

        //user_id
        $UserPrivacy->user_id = $UserPrivacy->user_id;
        // dd($UserPrivacy);
        $UserPrivacy->save();
        return redirect()->back()->with('message', 'Setting Updated!');
    }

    //===================================================
    public function agentsProfile()
    {

        return view("frontend.profile.agent");
    }

    //===================================================
    public function playersProfile()
    {
        return view("frontend.profile.player");
    }

    //===================================================
    public function guardianApproval($id)
    {
        $guardian = GuardianApproval::find($id);
        if ($guardian->status == "approved" || $guardian->status == "disapproved") {
            return redirect()->route('index')->with("error", "The status is already processed");
        } else {
            return view("frontend.guardian-approval", compact('guardian'));
        }
    }


    //===================================================
    public function guardianApprove(Request $request)
    {
        $guardian = GuardianApproval::find($request['guardian_id'])
            ->update([
                'status' => $request['status']
            ]);

        if ($guardian) {
            return redirect()->route('index')->with('success', 'Guardian Approval Status Updated Successfully');
        } else {
            return redirect()->route('index')->with('error', 'Guardian Approval Status Not Updated, Please check again later');
        }
    }


    //===================================================
    public function contactUsPost(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'message' => 'required',
        ]);

        $email = $request->all()['email'];
        $name = $request->all()['name'];
        $message = $request->all()['message'];

        $contactus = ContactUs::create(
            [
                'email' => $email,
                'name' => $name,
                'message' => $message,
            ]
        );
        Mail::to($email)->send(new MailsContactUs($email));
        if ($contactus) {
            return redirect()->route('contact-us')
                ->with('success', 'Your message has been sent successfully');
        } else {
            return redirect()->route('contact-us')
                ->with('error', 'Your message has not been sent, Please check again later');
        }
    }

    //===================================================
    public function mail_prefrences_notification(Request $request, $id)
    {
        $mail = Mail_prefreneces_notification::where('user_id', '=', $id)->first();
        $mail->comment = $request->comment;
        $mail->mention = $request->mention;
        $mail->message = $request->message;
        $mail->follow = $request->follow;
        $mail->article = $mail->article;
        $mail->sign_up_via_profile = $mail->sign_up_via_profile;
        $mail->revelent_post = $mail->revelent_post;
        $mail->user_id = $mail->user_id;
        $mail->save();
        return redirect()->route('playersetting');
    }

    //===================================================
    public function additionalPrefrences(Request $request, $id)
    {
        $mail = Mail_prefreneces_notification::where('user_id', '=', $id)->first();
        $mail->comment = $mail->comment;
        $mail->mention = $mail->mention;
        $mail->message = $mail->message;
        $mail->user_id = $mail->user_id;
        $mail->article = $request->article;
        $mail->sign_up_via_profile = $request->sign_up_via_profile;
        $mail->revelent_post       = $request->revelent_post;
        $mail->save();
        return redirect()->route('playersetting');
    }
}
