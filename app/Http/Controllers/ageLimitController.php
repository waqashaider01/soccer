<?php

namespace App\Http\Controllers;

use App\Models\GuardianApproval;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ageLimitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    //===================================================
    public function index()
    {
        $userinfo = GuardianApproval::where('player_id', Auth::user()->id)->where('photofront', null)->count();
        return view('backend.player.underage', compact('userinfo'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    //===================================================
    public function store(Request $request)
    {
        $request->validate(
            [
                'user_id' => ['unique:guardian_approvals,player_id'],
            ]
        );
        $user_id   = Auth::user()->id;
        $nicImages = GuardianApproval::where('player_id', $user_id)->first();

        if ($request->hasFile('photofront')) {
            $file       = $request->file('photofront');
            $extension  = $file->getClientOriginalExtension();
            $fileName   = 'frontphoto' . time() . '.' . $extension;
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
}
