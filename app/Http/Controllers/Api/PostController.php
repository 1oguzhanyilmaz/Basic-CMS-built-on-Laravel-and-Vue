<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {
        // return new PostResource(Post::all());
        return PostResource::collection(Post::latest()->paginate(5));
    }

    public function show($id){
        return new PostResource(Post::findOrFail($id));
    }

    public function getPosts($id){
        // return new PostResource(Post::where('category_id', $id)->get());
        return PostResource::collection(Post::where('category_id', $id)->latest()->paginate(5));
    }
}
