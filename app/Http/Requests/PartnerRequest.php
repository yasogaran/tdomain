<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
{
    public function authorize(): bool
    {
        return auth()->check() && auth()->user()->canAccessAdmin();
    }

    public function rules(): array
    {
        $partnerId = $this->route('partner') ? $this->route('partner')->id : null;

        $rules = [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'website_url' => 'nullable|url|max:255',
            'status' => 'required|in:active,inactive',
        ];

        // Logo is required only when creating
        if ($this->isMethod('post')) {
            $rules['logo'] = 'required|image|mimes:png,jpg,jpeg,svg|max:2048';
        } else {
            $rules['logo'] = 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Partner name is required',
            'logo.required' => 'Partner logo is required',
            'logo.image' => 'Logo must be an image file',
            'logo.max' => 'Logo must not exceed 2MB',
            'website_url.url' => 'Please enter a valid URL',
            'status.required' => 'Please select a status',
        ];
    }
}
