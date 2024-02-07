<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'data.attributes.login' => ['required', 'string', 'max:50', 'unique:users,login'],
            'data.attributes.userName' => ['nullable', 'string', 'max:20'],
            'data.attributes.surname' => ['nullable', 'string', 'max:100'],
            'data.attributes.email' => ['nullable', 'email', 'max:70'],
            'data.attributes.linkedIn' => ['nullable', 'string', 'max:30'],
            'data.attributes.entities_id' => ['required'],
        ];
    }
}
