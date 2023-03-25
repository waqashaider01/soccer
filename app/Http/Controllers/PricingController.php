<?php

namespace App\Http\Controllers;

use App\Models\Sub;
use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    //===================================================
    public function showpricing()
    {
        $subs = Sub::all();
        return  view('backend.admin.pricing.showpricing', compact('subs'));
    }

    //===================================================
    public function pricingform()
    {
        return view('backend.admin.pricing.addpricing');
    }

    //===================================================
    public function addpricing(Request $request)
    {
        $pricing = new Pricing;
        $pricing->Subscription = $request->subs;
        $pricing->Price        = $request->price;
        $pricing->save();

        session()->flash('success', 'Pricing Added!');
        return redirect()->back();
    }

    //===================================================
    public function editpricing($id)
    {
        $pricing = Pricing::find($id);
        return view('backend.admin.pricing.editpricing', compact('pricing'));
    }

    //===================================================
    public function updatepricing($id, Request $request)
    {
        $pricing = Pricing::find($id);
        $pricing->Subscription = $request->subs;
        $pricing->Price        = $request->price;
        $pricing->save();

        session()->flash('success', 'Pricing Updated!');
        return redirect()->route('admin.showpricing');
    }


    //===================================================
    public function deletepricing($id)
    {
        $pricing = Pricing::find($id);
        $pricing->delete();

        session()->flash('success', 'Pricing Deleted!');
        return redirect()->back();
    }
}
