<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PlayerCV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlayerCvController extends Controller
{

    //===================================================
    public function create()
    {
        return view('backend.player.profile.cv.create');
    }


    //===================================================
    public function store(Request $request)
    {
        $request->validate([
            'cv' => ['required', 'mimes:pdf', 'max:10000'],
        ]);

        if ($request->hasFile('cv')) {
            $file = $request->file('cv');
            $cvName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('documents'), $cvName);
        }

        $cv = PlayerCV::create([
            'player_id' => Auth()->id(),
            'cv' => $cvName,
        ]);

        if ($cv) {
            return redirect()->route('player.profile')
                ->with('success', 'CV created successfully');
        } else {
            return redirect()->route('player.profile')
                ->with('error', 'Something went wrong');
        }
    }


    //===================================================
    public function edit($id)
    {
        $cv = PlayerCV::find($id);
        return view('backend.player.profile.cv.edit', compact('cv'));
    }


    //===================================================
    public function update(Request $request)
    {
        $request->validate([
            'cv' => ['required', 'mimes:pdf', 'max:10000'],
        ]);

        $cv = PlayerCV::find($request['cid']);

        if ($request->hasFile('cv')) {
            $oldCv = public_path('documents/' . $cv->cv);
            if (file_exists($oldCv)) {
                unlink($oldCv);
            }

            $file = $request->file('cv');
            $cvName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('documents'), $cvName);
        }

        $cv->update([
            'cv' => $cvName,
        ]);


        if ($cv) {
            return redirect()->route('player.profile')
                ->with('success', 'CV updated successfully');
        } else {
            return redirect()->route('player.profile')
                ->with('error', 'Something went wrong');
        }
    }

    //===================================================
    public function destroy($id)
    {
        $cv = PlayerCV::find($id);
        $oldCv = public_path('documents/' . $cv->cv);
        if (file_exists($oldCv)) {
            unlink($oldCv);
        }
        $cv->delete();

        if ($cv) {
            return redirect()->route('player.profile')
                ->with('success', 'CV deleted successfully');
        } else {
            return redirect()->route('player.profile')
                ->with('error', 'Something went wrong');
        }
    }
}
