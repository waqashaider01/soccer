<?php

namespace App\Http\Controllers\admin;

use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{

    //===================================================
    public function index()
    {
        $languages = Language::latest()->paginate(10);
        return view("admin.language.index", compact("languages"));
    }

    //===================================================
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:languages|max:255',
        ]);


        $language = new Language;
        $language->name = $validated["name"];
        $language->save();

        return Redirect()->back()->with("success", "Language created successfully!");
    }

    //===================================================
    public function edit($id)
    {
        $language = Language::find($id);
        return view("admin.language.edit", compact("language"));
    }

    //===================================================
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:languages|max:255',
        ]);
        Language::find($id)->update([
            "name" => $request->name
        ]);
        return Redirect()->route("languages.index")->with("success", "Language updated successfully!");
    }

    //===================================================
    public function destroy($id)
    {
        $language = Language::find($id);
        $language->delete();
        return Redirect()->route("languages.index")->with("success", "Language deleted permanently!");
    }
}
