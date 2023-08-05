<?php

namespace App\Rules;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidUserId implements ValidationRule
{
    public function passes($attribute, $value)
    {
        return User::where('id', $value)->exists();
    }

    public function message()
    {
        return 'The selected user_id is invalid.';
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //
    }
}
