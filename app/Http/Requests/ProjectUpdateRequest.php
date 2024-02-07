<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectUpdateRequest extends FormRequest
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
            'data.attributes.title' => ['required', 'string', 'max:50', 'unique:projects,title'],
            'data.attributes.logo' => ['nullable'],
            'data.attributes.web' => ['nullable', 'string', 'max:100'],
            'data.attributes.projectDescription' => ['nullable', 'string'],
            'data.attributes.state' => ['required', 'in:Pendiente,Completado,En'],
            'data.attributes.initDate' => ['nullable', 'date'],
            'data.attributes.endDate' => ['nullable', 'date'],
        ];
    }
}
