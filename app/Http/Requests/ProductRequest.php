<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required|string',
            'mark' => 'required|string',
            'model' => 'required|string',
            'date' => 'required|date',
            'country' => 'required|string',
            'city' => 'required|string',
            'price' => 'required',
            'condition' => 'required|boolean',
            'product_type_id' => 'required|integer',
        ];
    }
}
