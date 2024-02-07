<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TechnologyUpdateRequest extends FormRequest
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
            'data.attributes.tag' => ['required', 'string', 'max:50', 'unique:technologies,tag'],
            'data.attributes.techName' => ['required', 'string', 'max:70'],
        ];
    }
}
