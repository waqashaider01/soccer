<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Models\ClubInfo;
use App\Mail\VerifyEmail;
use App\Models\CoachInfo;
use App\Models\ScoutInfo;
use App\Models\PlayerInfo;
use App\Models\AcademyInfo;
use App\Models\UserPrivacy;
use Illuminate\Support\Str;
// use App\Models\notification;
use Illuminate\Http\Request;
use App\Models\PlayerAttribute;
use App\Models\GuardianApproval;
use App\Models\IntermediaryInfo;
use App\Mail\GuardianApprovalMail;
use illuminate\Support\HtmlString;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Mail\verificatonemailtotheuser;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Models\Mail_prefreneces_notification;
use Illuminate\Foundation\Auth\RegistersUsers;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class RegisterController extends Controller
{

    use RegistersUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'category' => ['required'],
            'firstName' => ['required', 'string', 'max:255'],
            'lastName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirm'],
            'password_confirmation' => ["same:password"]
        ]);
    }


    //============================================================
    public function register(Request $request)
    {
        $data = $request->except('_token');

        $userExists = User::where('email', $request['email'])->first();
        session()->start();
        if (!$userExists) {
            $random  = Str::random(8);
            $randoms = Str::random(10);
            $user = User::create([
                'name'            => $request['firstName'] . " " . $request['lastName'],
                'email'           => $request['email'],
                'password'        => Hash::make($request['password']),
                'type'            => $request['category'],
                'status'          => 'active',
                // 'invitation_code' => $randoms,
                'token'           => $random,
            ]);
            // $message = '';
            Mail_prefreneces_notification::create([
                'mention' => 1,
                'comment' => 1,
                'follow' => 1,
                'message' => 1,
                'article' => 1,
                'user_id' => $user->id,
                'sign_up_via_profile' => 1,
                'revelent_post' => 1

            ]);

            event(new Registered($user));

            switch ($request->category) {
                case 'player':
                    $player_info = new PlayerInfo();
                    $player_info->player_id = $user->id;
                    $player_info->gender = $request['gender'];
                    $player_info->dob = $request['date_of_birth'];
                    $player_info->save();

                    $result = 'Thank You for choosing Soccer World Link.Please <b><a href="#">Upgrade</a></b> and
                         <b><a href="#">verify Your Account</a></b> in order to take full advantages of our services.';
                    $message = new \Illuminate\Support\HtmlString($result);
                    session()->flash('success', $message);

                    if (isset($request['date_of_birth']) && ($request['date_of_birth'] != null)) {
                        $birthdate = Carbon::parse($request['date_of_birth']);
                        $now = Carbon::today()->format('d-m-y');
                        $age = $birthdate->diffInYears($now);
                        if ($age <= 16) {
                            $guradian = GuardianApproval::create([
                                'player_id' => $user->id,
                                'gurdian_email' => $request['gurdian_email'],
                            ]);

                            $user->status = 'waiting';
                            $user->save();
                            $pdfPath = "files\consent.pdf";
                            $data['guardian']  = GuardianApproval::where('player_id', $user->id)->first();
                            $data['pdf']       = $pdfPath;

                            Mail::to($request->gurdian_email)->send(new GuardianApprovalMail($data));
                        }
                    }
                    break;

                case 'scout':
                    ScoutInfo::create(['scout_id' => $user->id]);
                    $result = 'Thank You for choosing Soccer World Link.Please <b><a href="#">Upgrade</a></b> and
                    <b><a href="#">verify Your Account</a></b> in order to take full advantages of our services.';
                    $message = new \Illuminate\Support\HtmlString($result);

                    session()->flash('success', $message);
                    break;

                case 'club':
                    ClubInfo::create(['club_id' => $user->id]);
                    $result = 'Thank You for choosing Soccer World Link.Please <b><a href="#">Upgrade</a></b> and
                    <b><a href="#">verify Your Account</a></b> in order to take full advantages of our services.';
                    $message = new \Illuminate\Support\HtmlString($result);
                    session()->flash('success', $message);

                    break;

                case 'coach':
                    CoachInfo::create(['coach_id' => $user->id]);
                    $message = 'Coach added successfully!';
                    session()->flash('success', $message);
                    break;

                case 'intermediary':
                    IntermediaryInfo::create(['intermediary_id' => $user->id]);
                    $message = 'Intermediary added successfully!';
                    session()->flash('success', $message);
                    break;

                case 'academy':
                    AcademyInfo::create(['academy_id' => $user->id]);
                    $result = 'Thank You for choosing Soccer World Link.Please <b><a href="#">Upgrade</a></b> and
                    <b><a href="#">verify Your Account</a></b> in order to take full advantages of our services.';
                    $message = new \Illuminate\Support\HtmlString($result);
                    break;

                default:
                    $message = 'Invalid user type';
                    session()->flash('success', $message);
                    break;
            }

            $data = $user;

            Mail::to($user->email)->send(new VerifyEmail($user));
            return view('home');
        } else {
            return redirect()->back()->with('error', 'User already exists');
        }
    }
}
