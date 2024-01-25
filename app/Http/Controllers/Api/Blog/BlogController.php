<?php

namespace App\Http\Controllers\Api\Blog;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Blog\BlogResource;

class BlogController extends Controller
{
    public function store(Request $request){
        $blog = Blog::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'author'=>$request->author
        ]);

        $blog->addMediaFromRequest('image')->toMediaCollection('blog','blog');

        return responseSuccessData(BlogResource::make($blog),'تم اضافة بلوج بنجاح');
    }
}
