<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Tag\CreateTagRequest;
use App\Http\Requests\Tag\UpdateTagRequest;
use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index()
    {
        return view('tags.index')->with('tags', Tag::all());
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(CreateTagRequest $request)
    {
        $request->createTag();

        return redirect('/admin/tags');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Tag $tag)
    {
        return view('tags.create')->with('tag', $tag);
    }

    public function update(UpdateTagRequest $request, Tag $tag)
    {
        $request->updateTag($tag);
        session()->flash('success', 'Tag is updated successfully');

        return redirect('/admin/tags');
    }

    public function destroy(Tag $tag)
    {
        if($tag->posts->count() > 0) {
            session()->flash('error', 'This tag cannot be deleted because it is associated to some posts');
            return back();
        }

        $tag->delete();
        session()->flash('success', 'Tag successfully deleted');

        return redirect(route('tags.index'));
    }
}
