<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;

class FaqController extends Controller
{
    // ===================================================
    public function showfaqs()
    {
        $faqs = FAQ::all();
        return view('backend.admin.faqs.ShowFaqs', compact('faqs'));
    }

    //===================================================
    public function faqform()
    {
        return view('backend.admin.faqs.FaqForm');
    }

    //===================================================
    public function addfaqs(Request $request)
    {
        $faq = new FAQ;
        $faq->question = $request->question;
        $faq->answer   = $request->answer;
        $faq->save();

        session()->flash('success', 'FAQ Added!');
        return redirect('admin/showfaqs');
    }


    //===================================================
    public function editfaqs($id)
    {
        $faqs = FAQ::where('id', $id)->first();
        return view('backend.admin.faqs.EditFaqs', compact('faqs', 'id'));
    }

    //===================================================
    public function updatefaqs(Request $request, $id)
    {
        $faqs = FAQ::find($id);
        $faqs->question = $request->question;
        $faqs->answer   = $request->answer;
        $faqs->save();

        session()->flash('success', 'FAQ Updated!');
        return redirect()->route('admin.showfaqs');
    }


    //===================================================
    public function deletefaqs($id)
    {

        $faqs = FAQ::find($id);
        $faqs->delete();
        session()->flash('success', 'FAQ Deleted!');
        return redirect()->route('admin.showfaqs');
    }
}
