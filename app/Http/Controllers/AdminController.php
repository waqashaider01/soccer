<?php

namespace App\Http\Controllers;

use App\Models\FAQ;
use App\Models\Sub;
use App\Models\Blog;
use App\Models\User;
use App\Models\Report;
use App\Models\HelpQuestion;
use Illuminate\Http\Request;
use App\Models\VerifyAccount;
use App\Models\Feature_update;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{

    //===================================================
    public function index()
    {
        $blogs = Blog::all()->count();
        $faqs  = FAQ::all()->count();
        $subs  = Sub::all()->count();
        $help  = HelpQuestion::all()->count();
        return view('backend.admin.index', compact('blogs', 'faqs', 'subs', 'help'));
    }


    //===================================================
    public function acceptBlog($id)
    {
        $blog = Blog::where('id', $id)->update(['status' => 'accepted']);

        if ($blog) {
            return redirect()->route('all-blogs', Auth::user()->type)
                ->with('success', 'Blog accepted successfully');
        } else {
            return redirect()->route('all-blogs', Auth::user()->type)
                ->with('error', 'Something went wrong');
        }
    }


    //===================================================
    public function rejectBlog($id)
    {
        $blog = Blog::where('id', $id)->update(['status' => 'rejected']);

        if ($blog) {
            return redirect()->route('all-blogs', Auth::user()->type)
                ->with('success', 'Blog rejected successfully');
        } else {
            return redirect()->route('all-blogs', Auth::user()->type)
                ->with('error', 'Something went wrong');
        }
    }


    //===================================================
    public function reports()
    {
        $reports = Report::all();
        return view('backend.admin.reports.index', compact('reports'));
    }

    //===================================================
    public function acceptReport($id)
    {
        $report = Report::find($id);
        $user   = $report->user;
        $user->update(['status' => 'blocked']);

        session()->flash('success', 'User blocked successfully');
        $report->delete();
        return redirect()->back();
    }


    //===================================================
    public function rejectReport($id)
    {
        Report::find($id)->delete();
        return redirect()->back();
    }

    //===================================================
    public function add_feature()
    {
        $Feature = Feature_update::all();
        return view('backend.admin.feature.feature_add', compact('Feature'));
    }

    //===================================================
    public function update_feature(Request $request, $id)
    {
        $update = Feature_update::find($id);
        $update->market_post_pre_month = $request->market;
        $update->messages_pre_month = $request->message;
        $save = $update->save();
        return back();
    }

    /***************************** Help Questions ***********************************************/
    public function viewhelpquestion()
    {
        $generl   = HelpQuestion::where('category', 'general')->get();
        $players  = HelpQuestion::where('category', 'players')->get();
        $agents   = HelpQuestion::where('category', 'agents')->get();
        $acadmies = HelpQuestion::where('category', 'acadmies')->get();
        return view('backend.admin.Help.helpquestion', compact('generl', 'players', 'agents', 'acadmies'));
    }

    //===================================================
    public function helpqes(Request $request, $id = Null)
    {
        $help = new HelpQuestion;
        $data = array(
            'question'   => $request->question,
            "answer"     => $request->answer,
            "category"   => $request->category,
        );

        $help->updateOrCreate(['id' => $request->id], $data);
        return redirect('/admin/helpquestion');
    }

    //===================================================
    public function helpquestiondelete($id)
    {
        $delete = HelpQuestion::find($id);
        $delete->delete();
        return redirect('/admin/helpquestion');
    }
}
