<?php

namespace App\Http\Requests\Admin\Program;

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
            'title' => 'required|string|max:100',
            'description' => 'required|string',
            'time' => 'required|numeric',
            'cost' => 'required|numeric',
            'tag' => 'required|string',
            'image' => 'required|mimes:jpeg,jpg,png',
            'stage_name.*' => 'required|string|max:100', 
            'stage_description.*' => 'required|string',
            'attachment.*.*.*' => 'nullable|mimes:jpeg,jpg,png,pdf,mp4,avi',
            'step_name.*.*' => 'required|string|max:100',
            'step_description.*.*' => 'required|string|max:100',
            'comment.*.*' => 'nullable|string|max:200'
        ];
    }

    public function messages()
    {
        return [
            'stage_name.*.required' => 'Stage name is required.',
            'stage_description.*.required' => 'Stage description is required.',
            'step_name.*.*.required' => 'Step Name is required.',
            'step_description.*.*.required' => 'Step description is required.',
        ];
    }
}
