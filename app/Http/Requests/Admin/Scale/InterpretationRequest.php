<?php

namespace App\Http\Requests\Admin\Scale;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class InterpretationRequest extends FormRequest
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
            'title.*' => 'required',
            'question.*' => 'required',
            'min.*.*' => 'required|integer',
            'max.*.*' => 'required|integer',
            'value.*.*' => 'required|string|max:150',
        ];
    }
}
