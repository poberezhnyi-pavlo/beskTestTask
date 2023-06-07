<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

final class UpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $productId = $this->route('product')->id;

        return [
            'name' => [
                'required',
                'string',
                'min:2',
                Rule::unique(Product::class)->ignore($productId),
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'price_in_usd' => [
                'required',
                'numeric',
            ],
        ];
    }
}
