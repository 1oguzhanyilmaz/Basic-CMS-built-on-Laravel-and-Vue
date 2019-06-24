<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Category\CreateCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        return view('categories.index')->with('categories', Category::all());
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        $request->createCategory();

        return redirect('/admin/categories');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('categories.create')->with('category', $category);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $request->updateCategory($category);

        session()->flash('success', 'Category is updated successfully');

        return redirect('/admin/categories');
    }

    public function destroy(Category $category)
    {
        if($category->posts->count() > 0) {
            session()->flash('error', 'This category is cannot be deleted because it has some posts');
            return back();
        }

        $category->delete();
        session()->flash('success', 'Category successfully deleted');

        return redirect(route('categories.index'));
    }
}
