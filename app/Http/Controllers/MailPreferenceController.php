<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use App\Mail\MailsContactUs;
use Illuminate\Http\Request;
use App\Models\MailPreference;
use Illuminate\Support\Facades\Auth;

class MailPreferenceController extends Controller
{

    //===================================================
    public function index(Request $request)
    {
        $user_idd = Auth::id();
        $data     = new MailPreference();
        if ($request->new_follower) {
            $data->follower_status = 1;
        }
        if ($request->invite_refral) {
            $data->invite_status = 1;
        }
        $data->user_id = $user_idd;
        $data->save();
        return view('backend.setting', compact('data'));
    }

    //===================================================
    public function follow_mail(Request $request)
    {
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
    }
}
