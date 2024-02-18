<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJob extends FormRequest
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
            'title.en' => 'required|string',
            'title.ar' => 'required|string',
            'description.en' => 'required|string',
            'description.ar' => 'required|string',
            'categories.en' => 'required|string',
            'categories.ar' => 'required|string',
            'location.en' => 'required|string',
            'location.ar' => 'required|string',
            'experience.en' => 'required|string',
            'experience.ar' => 'required|string',
            'open_jobs' => 'required|numeric',
        ];
    }
}
