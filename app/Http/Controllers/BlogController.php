<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogGetUserBlogRequest;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Http\Resources\BlogCollection;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index() {
        return BlogResource::collection(Blog::all());
    }

    public function  all(BlogGetUserBlogRequest $request){
        return new BlogCollection(Blog::paginate(10));
    }
    public function show(Blog $blog) {
//        if(Auth::check())
            return new BlogResource($blog);
//        else
//            return response()->json(['message'=> 'authentication required']);
    }

    public function store(BlogStoreRequest $request)
    {
        $blog = Blog::create($request->validated());
        if($blog)
            return response()->json([
                'message' => "record created",
                'data' => $blog,
            ]);
        return response()->json([
            'message' => "record cannot be created",
        ]);
    }

    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        $blog->update($request->validated());
        return response()->json([
            'message' => "record updated correctly",
            'data' => $blog,
        ]);
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return response()->json("record deleted");
    }
}
