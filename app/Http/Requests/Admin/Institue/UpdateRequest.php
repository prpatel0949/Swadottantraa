<?php

namespace App\Http\Requests\Admin\Institue;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
        $id = $this->route('institue');
        return [
            'name' => 'required|string|max:100|unique:users,name,'.$id,
            'email' => 'required|string|max:150|unique:users,email,'.$id,
            'mobile' => 'required|numeric|digits:10',
            'address' => 'nullable|string'
        ];
    }
}
