<?php

namespace App\Http\Requests\Individual;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::user()->id],
            'mobile' => ['required', 'numeric', 'digits:10', 'unique:users,mobile,'.Auth::user()->id],
            'dob' => [ 'nullable', 'date', 'date_format:m/d/Y' ],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'profile' => [ 'nullable', 'mimes:png,jpg,jpeg, gif', 'max:800' ],
            'gender' => [ 'nullable', 'boolean' ],
            'franchisee_code' => [ 'nullable', 'max:20' ],
            'education' => [ 'nullable', 'string', 'max:100' ],
            'occupation' => [ 'nullable', 'string', 'max:100' ],
            'address' => [ 'nullable', 'string' ],
        ];
    }
}
