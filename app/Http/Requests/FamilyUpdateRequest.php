<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FamilyUpdateRequest extends FormRequest
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
            'data.attributes.familyCode' => ['required', 'string', 'max:20', 'unique:families,familyCode'],
            'data.attributes.familyName' => ['required', 'string', 'max:50'],
        ];
    }
}
