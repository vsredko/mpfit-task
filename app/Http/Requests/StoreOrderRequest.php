<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'customer_name' => ['required', 'string'],
            'product_id' => ['required', Rule::exists('products', 'id')],
            'count' => ['required', 'integer', 'min:1'],
            'comment' => ['nullable', 'string'],
        ];
    }

    public function orderAttributes(): array
    {
        $attributes = $this->validated();

        $product = Product::find($attributes['product_id']);

        $attributes['total_price'] = $attributes['count'] * $product->price;

        return $attributes;
    }
}
