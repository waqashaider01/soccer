<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\privacy;
use App\Models\Terms;
use App\Models\AboutUs;

class privacyController extends Controller
{

    //===================================================
    public function editPrivacy()
    {
        $privaccy  = privacy::all();
        return view('frontend.editPrivacy')->with(['privaccy' => $privaccy]);
    }


    //===================================================
    public function updatePrivacy(request $request)
    {
        $result = privacy::first();
        $result->privacy_policy = $request->privacy_policy;
        $result->save();
        if ($result) {
            return redirect()->route('privacy-policy')->with('success', ' Updated Successfully');
        } else {
            return redirect()->route('privacy-policy')->with('error', 'Not Updated, Please check again later');
        }
    }


    //===================================================
    public function editAbout()
    {
        $privaccy  = AboutUs::all();
        return view('frontend.editAbout')->with(['privaccy' => $privaccy]);
    }

    //===================================================
    public function updateAbout(request $request)
    {
        $result = AboutUs::first();
        $result->partA = $request->partA;
        $result->partB = $request->partB;
        $result->partC = $request->partC;
        $result->save();
        if ($result) {
            return redirect()->route('about-us')->with('success', ' Updated Successfully');
        } else {
            return redirect()->route('about')->with('error', 'Not Updated, Please check again later');
        }
    }


    //===================================================
    public function editTerms()
    {
        $privaccy  = terms::all();
        return view('frontend.editTerms')->with(['privaccy' => $privaccy]);
    }


    //===================================================
    public function updateTerms(request $request)
    {
        $result = terms::first();
        $result->terms_conditions = $request->terms_conditions;
        $result->save();
        if ($result) {
            return redirect()->route('terms')->with('success', ' Updated Successfully');
        } else {
            return redirect()->route('terms')->with('error', 'Not Updated, Please check again later');
        }
    }
}
