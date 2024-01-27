<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function  index()
    {
        $blog = Blog::get();
        return view('backend.Blog.dashboard_blog', ['blog' => $blog]);
    }

    public function create()
    {
        return view('backend.Blog.dashboard_add_blog');
    }

    public function store(Request $request)
    {
        $validation =  $request->validate([
            'image'=>'required',
            'title'=>'required|string',
            'content'=>'required',
            'author'=>'nullable'
        ]);

        try {
            $blog = Blog::create($validation);

            if ($request->hasFile('image')) {
                $blog->addMediaFromRequest('image')->toMediaCollection('blog', 'blog');
            }
            session()->flash('add_blog', 'Add Blog Successfully');
            return redirect()->route('blog.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function update(Request $request , Blog $blog)
    {
        try {
            $blog->update([
                'title'=>$request->title,
                'content'=>$request->input('content'),
                'author'=>$request->author
            ]);

            if ($request->hasFile('image')) {
                $blog->clearMediaCollection('blog', 'blog');
                $blog->addMediaFromRequest('image')->toMediaCollection('blog', 'blog');
            }

            session()->flash('add_blog', 'Add Blog Successfully');
            return redirect()->route('blog.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['message' => $e->getMessage()]);
        }
    }

    public function destroy(Blog $blog)
    {
        try {
            $blog->delete();
            // session()->flash('ActiveAds', 'Ad Deleted Successfully');
            return redirect()->route('blog.index');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
