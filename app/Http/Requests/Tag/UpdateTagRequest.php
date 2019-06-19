<?php

namespace App\Http\Requests\Tag;

use App\Tag;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends FormRequest
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
            'name' => 'required|unique:tags'
        ];
    }

    public function updateTag($tag)
    {
        $tag->update([
            'name' => $this->name
        ]);

        session()->flash('success', 'Tag is successfully updated.');
    }
}
