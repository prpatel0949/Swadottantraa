<?php

namespace App\Http\Requests\Admin\Workout;

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
            'title' => 'required|string|max:200',
            'wdescription' => 'nullable|string',
            'question.*' => 'required|string',
            'description.*' => 'nullable|string',
            // 'answer.*' => 'required|max:500',
            'answer.*.*' => 'required|max:200',
        ];
    }

    public function messages()
    {
        return [
            'question.*.required' => 'The question field is required.',
            'description.*.required' => 'The description field is required.',
            'answer.*.required' => 'The answer field is required',
            'answer.*.*.required' => 'The answer field is required'
        ];
    }
}
