<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // if true, execute rules()
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required', 
            'founded' => 'required|integer|min:0|max:2021', 
            'description' => 'required'
        ];
    }
}
