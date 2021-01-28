<?php

namespace App\Http\Requests\Comment;

use App\Rules\CreateComment;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

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
