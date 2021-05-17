<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
            'name' => 'bail|required|string|max:50',
            'email' => 'bail|required|email|max:50|unique:users',
            'phone' => 'bail|required|numeric|size:11|unique:users',
            'image' => 'bail|image|max:1024',
            'role' => 'bail|required|string',
            'status' => 'bail|required|string',
            'password' => 'bail|required|string|confirmed|min:8',
            'password_confirmation' => 'bail|required|string',
        ];
    }
}
