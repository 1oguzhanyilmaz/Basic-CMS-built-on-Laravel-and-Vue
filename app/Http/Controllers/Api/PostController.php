<?php

namespace App\Http\Controllers\Api;

use App\Category;
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

    public function show($slug){
        return new PostResource(Post::where('slug', $slug)->first());
    }

    public function getPosts($slug){
        // return new PostResource(Post::where('category_id', $id)->get());
        $category = Category::where('slug',$slug)->first();
        return PostResource::collection(Post::where('category_id', $category->id)->latest()->paginate(5));
    }
}
