<?php

namespace App\Http\Controllers;


use App\Models\GuardianApproval;
use App\Models\User;
use App\Models\VerifyAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AccVerification;
use App\Models\Sub;
use App\Models\BlockedUsers;
use Session;
use Redirect;


class VerifyAccountController extends Controller
{

    public function index()
    {
        $userinfo = VerifyAccount::where('user_id', Auth::user()->id)->get();
        return view('verify_acc', compact('userinfo'));
    }

    //===================================================
    public function store(Request $request)
    {
        $request->validate(
            [
                'user_id'    => ['unique:verify_account,user_id'],
                'photofront' => ['required'],
                'photoback'  => ['required'],
            ]
        );

        $nicImages = new VerifyAccount;
        $nicImages->user_id = $request->user()->id;
        if ($request->hasFile('photofront')) {
            $file      = $request->file('photofront');
            $extension = $file->getClientOriginalExtension();
            $fileName  = 'frontphoto' . time() . '.' . $extension;
            $file->move('uploads/nicImages/', $fileName);
            $nicImages->photofront = $fileName;
        }
        if ($request->hasFile('photoback')) {
            $file      = $request->file('photoback');
            $extension = $file->getClientOriginalExtension();
            $fileName  = 'backphoto' . time() . '.' . $extension;
            $file->move('uploads/nicImages/', $fileName);
            $nicImages->photoback = $fileName;
        }
        $nicImages->save();
        return redirect()->back()->with('message', 'Documents succussfully sent for verification!');
    }

    //===================================================
    public function show()
    {
        $user        = VerifyAccount::where('status', 0)->get();
        $verified    = VerifyAccount::where('status', 1)->get();
        $userDetails = User::all();
        $userinfo    = GuardianApproval::where('status', 'waiting')->get();
        return view('backend.admin.verifications.index', compact('user', 'verified', 'userDetails', 'userinfo'));
    }

    //===================================================
    public function underage()
    {
        //        $user = VerifyAccount::where('status', 0)->get();
        //        $verified = VerifyAccount::where('status', 1)->get();
        $userDetails = User::all();
        $userinfo = GuardianApproval::where('status', 'waiting')->get();
        return view('backend.admin.verifications.underage', compact('userDetails', 'userinfo'));
    }


    //===================================================
    public function verifyAge($id)
    {
        $verifyAge = GuardianApproval::find($id);
        $verifyAge->status = 'approved';
        $verifyAge->update();
        return redirect()->back();
    }

    //===================================================
    public function verifyImage($id)
    {
        $verifyImage = VerifyAccount::find($id);
        $verifyImage->status = 1;
        $verifyImage->update();
        return redirect()->back()->with('message', 'User Documents approved successfully');
    }

    public function verificationText(Request $request)

    {

        $verificationText = AccVerification::updateOrCreate(
            ['id' => 1],
            ['title' => request()->title, 'description' => request()->description]
        );
        return back()->with('message', 'message|Record Added.');
    }

    public function delete($id)

    {
        $data = AccVerification::find($id);
        $data->delete();
        return back()->with('message', 'message|Record Deleted.');
    }

}
