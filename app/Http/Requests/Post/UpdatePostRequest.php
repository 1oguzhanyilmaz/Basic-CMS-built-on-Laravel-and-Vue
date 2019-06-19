<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'contents' => 'required',
            'category' => 'required'
        ];
    }

    public function updatePost($post)
    {
        $data = $this->only([
            'title',
            'description',
            'published_at',
            'contents',
            'category'
        ]);

        $update = [
            'title' => $data['title'],
            'description' => $data['description'],
            'published_at' => $data['published_at'],
            'content' => $data['contents'],
            'category_id' => $data['category']
        ];

        if($this->hasFile('image')) {
            $image = $this->image->store('posts');
            $post->deleteImage();
            $update['image'] = $image;
        }

        if($this->tags) {
            $post->tags()->sync($this->tags);
        }

        $post->update($update);

        session()->flash('success', 'Post updated successfully');
    }
}
