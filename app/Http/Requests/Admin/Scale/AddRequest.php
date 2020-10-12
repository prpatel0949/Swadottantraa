<?php

namespace App\Http\Requests\Admin\Scale;

use Auth;
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
            'title' => 'required|string|max:50',
            'scale_description' => 'required|string|max:200',
            'interpreatation' => 'nullable|string|max:200',
            'question.*' => 'required|string|max:150',
            'description.*' => 'required|string|max:200',
            'answer.*.*' => 'required|string|max:100',
            'answer_value.*.*' => 'nullable|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'question.*.required' => 'The question field is required.',
            'description.*.required' => 'The description field is required.',
            'answer.*.*.required' => 'The answer field is required'
        ];
    }
}
