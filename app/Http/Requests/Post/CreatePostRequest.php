<?php

namespace App\Http\Requests\Post;

use App\Post;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|unique:posts',
            'description' => 'required',
            'contents' => 'required',
            'image' => 'file|image|max:5000',
            'category' => 'required'
        ];
    }

    public function createPost()
    {
        $image = $this->image->store('uploads','public');

        $post = Post::create([
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->contents,
            'image' => $image,
            'user_id' => auth()->user()->id,
            'published_at' => $this->published_at,
            'category_id' => $this->category
        ]);

        if($this->tags) {
            $post->tags()->attach($this->tags);
        }

        session()->flash('success', 'Post created successfully');
    }
}
