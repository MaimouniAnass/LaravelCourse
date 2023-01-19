<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nameEt' => 'required|max:20|min:5',
            'emailEt' => 'required',
            'passwordEt' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'nameEt.required' => 'name is empty',
            'nameEt.max' => 'name is long max:20 ',
            'nameEt.min' => 'name is short min:5',
            'emailEt.required' => 'email is empty',
        ];
    }
}
