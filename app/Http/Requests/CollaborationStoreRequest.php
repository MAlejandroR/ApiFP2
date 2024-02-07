<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CollaborationStoreRequest extends FormRequest
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
            'data.attributes.project_id' => ['required|unique:projects,id'],
            'data.attributes.user_id' => ['required|unique:users,id'],
            'data.attributes.family_id' => ['required|unique:families,id'],
            'data.attributes.isManager' => ['required|bool'],
        ];
    }
}
