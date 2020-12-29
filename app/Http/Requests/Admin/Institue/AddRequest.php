<?php

namespace App\Http\Requests\Admin\Institue;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:100|unique:users,name',
            'email' => 'required|string|max:150|unique:users,email',
            'mobile' => 'required|numeric|digits:10',
            'address' => 'nullable|string',
            'number_of_users' => 'required|numeric'
        ];
    }
}
