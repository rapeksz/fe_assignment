<?php

namespace App\Rules;

use App\Models\Comment;
use Illuminate\Contracts\Validation\Rule;

class CreateComment implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (is_null($value)) {
            return true;
        }

        return Comment::where('id', $value)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The :attribute not exists into the database.';
    }
}
