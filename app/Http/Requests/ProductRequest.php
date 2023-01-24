<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['bail', 'required', 'min:5', 'max:255'],
            'description' => ['required', 'min:5', 'max:700'],
            'price' => ['required', 'numeric', 'min:1'],
            'image' => $this->product ?
                ['image', 'mimes:jpg,jpeg,png,gif,svg', 'max:2048'] :
                ['required', 'image', 'mimes:jpg,jpeg,png,gif,svg', 'max:2048'],
            'categories' => ['nullable', 'array', 'exists:categories,id'],
        ];
    }
}
