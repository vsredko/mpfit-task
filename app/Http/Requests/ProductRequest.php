<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'price' => ['required', 'numeric', 'min:0', 'max:100000000', 'regex:/^\d+(\.\d{1,2})?$/'],
            'description' => ['nullable', 'string'],
        ];
    }
}
