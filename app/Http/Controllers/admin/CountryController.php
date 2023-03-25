<?php

namespace App\Http\Controllers\admin;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    //===================================================
    public function index()
    {
        $countries = Country::latest()->paginate(10);
        return view("admin.country.index", compact("countries"));
    }

    //===================================================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:countries|max:255',
        ]);

        $country = new Country;
        $country->name = $validated["name"];
        $country->save();
        return Redirect()->back()->with("success", "Country created successfully!");
    }

    //===================================================
    public function edit($id)
    {
        $country = Country::find($id);
        return view("admin.country.edit", compact("country"));
    }

    //===================================================
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:countries|max:255',
        ]);
        Country::find($id)->update([
            "name" => $request->name
        ]);
        return Redirect()->route("countries.index")->with("success", "Country updated successfully!");
    }

    //===================================================
    public function destroy($id)
    {
        $country = Country::find($id);
        $country->delete();
        return Redirect()->route("countries.index")->with("success", "Country deleted permanently!");
    }
}
