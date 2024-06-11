<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreParentAndChildRequest extends FormRequest
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
            'name' => 'required',
            'national_id' => 'required|numeric|digits:14',
            'child_name' => 'required',
            'length' => 'required',
            'weight' => 'required',
            'gender' => 'required',
            'dateOfbirth' => 'required',
        ];
    }
}
