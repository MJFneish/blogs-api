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
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'show']]);
    }

    public function index(Request $request) {
//        return BlogResource::collection(Blog::all());
        return new BlogCollection(Blog::where('id', '>', $request->firstId ?: 0)->paginate($request->per_page));
    }

    public function show(Blog $blog) {
        return new BlogResource($blog);
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
        return response()->json(['message' => "record deleted"]);
    }
}
