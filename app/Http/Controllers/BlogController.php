<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    //===================================================
    public function index()
    {
        if (Auth::user()->type == 'admin') {
            $blogs = Blog::all();
        } else {
            $blogs = Blog::where('user_id', Auth::id())->where('status', 'accepted')->get();
        }
        return view('backend.' . Auth::user()->type . '.blog.index', compact('blogs'));
    }

    //===================================================
    public function create()
    {
        return view('backend.' . Auth::user()->type . '.blog.create');
    }


    //===================================================
    public function store(Request $request)
    {
        // return Auth::id();
        $request->validate([
            'image'       => ['required'],
            'title'       => ['required'],
            'description' => ['required']
        ]);

        $image = $request->file('image');
        $imageName = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/blog/'), $imageName);

        // $blog = Blog::create([
        //     'user_id' => Auth::id(),
        //     'image' => $imageName,
        //     'title' => $request['title'],
        //     'description' => $request['description']
        // ]);
        $blog=new blog();
        $blog->user_id=Auth::id();
        $blog->image=$imageName;
        $blog->title=$request['title'];
        $blog->description=$request['description'];
        $blog->save();

        if ($blog) {
            return redirect()->route('all-blogs', Auth::user()->type)->with('success', 'Blog created successfully');
        } else {
            return redirect()->route('all-blogs', Auth::user()->type)->with('error', 'Something went wrong');
        }
    }


    //===================================================
    public function edit($type, $id)
    {
        $blog = Blog::find($id);
        return view('backend.' . Auth::user()->type . '.blog.edit', compact('blog'));
    }

    //===================================================
    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required']
        ]);

        $blog = Blog::find($request['blog_id']);

        if ($request->hasFile('image')) {
            $image     = $request->file('image');
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/blog/'), $imageName);
            if (file_exists(public_path('images/blog/') . $blog->image)) {
                unlink(public_path('images/blog/') . $blog->image);
            }
        } else {
            $imageName = $blog->image;
        }
        $blog = $blog->update([
            'image'         => $imageName,
            'title'         => $request['title'],
            'description'   => $request['description']
        ]);

        if ($blog) {
            return redirect()->route('all-blogs', Auth::user()->type)
                ->with('success', 'Blog updated successfully');
        } else {
            return redirect()->route('all-blogs', Auth::user()->type)
                ->with('error', 'Something went wrong');
        }
    }


    //===================================================
    public function destroy($id)
    {
        $blog = Blog::find($id);
        if (file_exists(public_path('images/blog/') . $blog->image)) {
            unlink(public_path('images/blog/') . $blog->image);
        }
        $blog->delete();

        if ($blog) {
            return redirect()->route('all-blogs', Auth::user()->type)
                ->with('success', 'Blog deleted successfully');
        } else {
            return redirect()->route('all-blogs', Auth::user()->type)
                ->with('error', 'Something went wrong');
        }
    }
}
