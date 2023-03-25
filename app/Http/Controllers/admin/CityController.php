<?php

namespace App\Http\Controllers\admin;

use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    //===================================================
    public function index()
    {
        $cities    = City::latest()->paginate(10);
        $countries = Country::all();
        return view("admin.city.index", compact("cities", "countries"));
    }

    //===================================================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|unique:cities|max:255',
            'country' => 'required|max:255',
        ]);

        $city = new City;
        $city->name       = $validated["name"];
        $city->country_id = $validated["country"];
        $city->save();

        return Redirect()->back()->with("success", "City created successfully!");
    }

    //===================================================
    public function edit($id)
    {
        $city = City::find($id);
        return view("admin.city.edit", compact("city"));
    }

    //===================================================
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:cities|max:255',
        ]);
        City::find($id)->update([
            "name" => $request->name
        ]);
        return Redirect()->route("cities.index")->with("success", "City updated successfully!");
    }

    //===================================================
    public function destroy($id)
    {
        $city = City::find($id);
        $city->delete();
        return Redirect()->route("cities.index")->with("success", "City deleted permanently!");
    }

    //===================================================
    public function ajaxGetCities($id)
    {
        $cities = City::where("country_id", $id)->get();
        return json_encode($cities);
    }
}
