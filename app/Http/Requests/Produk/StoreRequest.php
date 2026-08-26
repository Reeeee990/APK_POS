<?php

namespace App\Http\Requests\Produk;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|string|max:255',
            'jenis_id' => 'required|exists:jenis,id',
            'purchase_price' => 'required|integer|min:0',
            'selling_price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
        ];
    }
    public function messages(): array
    {
        return [
            'foto.image' => 'The uploaded file must be an image.',
            'foto.mimes' => 'The image must be JPG, JPEG, or PNG.',
            'foto.max' => 'The image must not exceed 2MB.',
            'name.required' => 'Product name is required.',
            'email.email' => 'Please enter a valid email address.',
            'purchase_price.required' => 'Purchase price is required.',
            'purchase_price.integer' => 'Purchase price must be a whole number.',
            'selling_price.required' => 'Selling price is required.',
            'selling_price.integer' => 'Selling price must be a whole number.',
            'stock.required' => 'Stock is required.',
            'stock.integer' => 'Stock must be a number.',
            'jenis_id.required' => 'Please select a product type.',
            'jenis_id.exists' => 'The selected product type is invalid.',
        ];
    }
}
