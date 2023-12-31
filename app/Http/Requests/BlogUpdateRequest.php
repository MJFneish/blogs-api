<?php

namespace App\Http\Requests;

use App\Rules\ValidUserId;
use Illuminate\Foundation\Http\FormRequest;

class BlogUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => ['required', 'integer', 'max:255', new ValidUserId],
            'name' => 'required|string|min:3|max:255',
            'slug' => 'required|string|min:3|max:255',
            'desc' => 'required|string',
            'author' => 'required|string|min:3|max:255',
        ];
    }
}
