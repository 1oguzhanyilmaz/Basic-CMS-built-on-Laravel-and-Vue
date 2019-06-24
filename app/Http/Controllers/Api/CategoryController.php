<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        // return new CategoryResource(Category::all());
        return CategoryResource::collection(Category::all());
    }

    public function getCategory($id){
        return new CategoryResource(Category::findOrFail($id));
    }
}
