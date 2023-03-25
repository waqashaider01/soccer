<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Report;
use App\Mail\ContactUs;
use App\Models\PlayerCV;
use App\Models\Followers;
use App\Models\BlockedUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Mail_prefreneces_notification;

class GuestController extends Controller
{
    //===================================================
    public function downloadCv($id)
    {
        $cv = PlayerCV::where('player_id', $id)->first();
        if ($cv) {
            $file = public_path('documents/' . $cv->cv);
            return response()->download($file);
        } else {
            return "Cv is not uploaded by the Player";
        }
    }


    //===================================================
    public function report($id)
    {
        $user = User::find($id);
        return view('frontend.report', compact('user'));
    }

    public function submitReport(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'type'    => 'required',
            'reason'  => 'required',
        ]);

        $report = Report::create([
            'user_id'     => $request['user_id'],
            'reported_id' => Auth::id(),
            'type'        => $request['type'],
            'reason'      => $request['reason'],
        ]);

        if ($report) {
            return redirect()->back()->with('success', 'Report submitted successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    //===================================================
    public function block($id)
    {
        $user = User::find($id);
        $user->status = "blocked";
        $user->save();
        if ($user) {
            return redirect()->back()->with('success', 'blocked successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }


    //===================================================
    public function unblock($id)
    {

        $user = User::find($id);
        $user->status = "";
        $blockuser = BlockedUsers::where("blocked_id", $id)->delete();

        $user->save();
        if ($user) {
            return redirect()->back()->with('success', 'Unblocked successfully');
        } else {
            dd("testsss");

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }


    //===================================================
    public function blockMsg($id)
    {
        $follow = BlockedUsers::create([
            'user_id'    => Auth::id(),
            'blocked_id' => $id,
        ]);
        $follow->save();
        if ($follow) {
            return redirect()->back()->with('success', 'followed successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    //===================================================
    public function UnblockMsg($id)
    {
        $idd = Auth::id();
        $unblock = BlockedUsers::where('user_id', $idd)->where('blocked_id', $id)->delete();
        if ($unblock) {
            return redirect()->back()->with('success', 'unblock successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }


    //===================================================
    public function follow($id)
    {
        $data = DB::table('users')->where('id', $id)
            ->select('email')->first();
        $email = $data->email;

        $notify = Mail_prefreneces_notification::where('user_id', $id)->first();
        if ($notify) {
            if ($notify->follow == 1) {

                $mailData = [
                    'title' => 'you have a new follower',
                    'body' => 'you are followed by' . auth()->user()->name
                ];
                Mail::to($email)->send(new ContactUs($mailData));
            }
        }
        $follow = Followers::create([
            'follower'  => Auth::id(),
            'following' => $id,
        ]);
        $follow->save();
        if ($follow) {
            return redirect()->back()->with('success', 'Followed successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    //===================================================
    public function unfollow($id)
    {
        $idd      = Auth::id();
        $unfollow = Followers::where('following', $id)->where('follower', $idd)->delete();
        if ($unfollow) {
            return redirect()->back()->with('success', 'unfollowed successfully');
        } else {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
