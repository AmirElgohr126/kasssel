<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlog extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title.en.*' => 'required|string|max:255',
            'title.ar.*' => 'required|string|max:255',
            'description.en.*' => 'required|string',
            'description.ar.*' => 'required|string',
            'categories.en' => 'required|string|max:255',
            'categories.ar' => 'required|string|max:255',
            'image.*' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:6048',
            ],
        ];

    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.main.required' => 'The main title is required.',
            'description.main.required' => 'The main description is required.',
            'image.*.mimes' => 'Only jpeg, png, jpg, gif, and svg files are allowed.',
            'image.*.max' => 'Images may not be larger than 6MB.',
        ];
    }
}
