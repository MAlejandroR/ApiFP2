<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EntityStoreRequest extends FormRequest
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
            'data.attributes.entityName' => ['required', 'string', 'max:70'],
            'data.attributes.entityCode' => ['required', 'string', 'max:20', 'unique:entities,entityCode'],
            'data.attributes.web' => ['nullable', 'string', 'max:100'],
            'data.attributes.email' => ['nullable', 'email', 'max:70'],
        ];
    }
}
