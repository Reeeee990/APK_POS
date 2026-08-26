<?php

namespace App\Http\Requests\User;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'      => 'required|string|max:100',
            'email'     => [
                'required',
                'email',
                Rule::unique('users')->ignore($this->route('user')),
            ],
            'password'  => 'nullable|min:3',
            'role_id'   => 'required',
            'is_active' => 'boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'  => 'Name is required.',
            'name.max'       => 'Name cannot exceed 100 characters.',
            'email.required' => 'Email is required.',
            'email.email'    => 'Please enter a valid email address.',
            'password.min'   => 'Password must be at least :min characters.',
            'role_id.required' => 'Please select a role.'
        ];
    }
}