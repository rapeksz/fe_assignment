<?php

namespace App\Http\Requests\Comment;

use App\Rules\CreateComment;
use Illuminate\Foundation\Http\FormRequest;

class StoreComment extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'parent_id' => new CreateComment(),
            'body' => ['required', 'string'],
        ];
    }
}
