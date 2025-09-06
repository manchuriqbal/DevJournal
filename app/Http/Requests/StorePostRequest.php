<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|string|max:255",
            "content" => "required|string",
            'postable_type' => ['required','string','in:App\\Models\\Admin,App\\Models\\Creator'],
            'postable_id' => ['required','integer','postable_exists'],
            "category_id" => "required|exists:categories,id",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",

        ];
    }
}
