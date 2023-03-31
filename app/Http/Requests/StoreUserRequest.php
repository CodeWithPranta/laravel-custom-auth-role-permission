<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3'],
            'phone' => ['required', 'min:11', Rule::unique('users', 'phone')],
            'father_name' => ['required', 'min:3'],
            'mother_name' => ['required', 'min:3'],
            'password' => ['required', 'confirmed', 'min:8'],
            'is_baruikati' => ['required'],
            'address' => [],
        ];
    }
}
