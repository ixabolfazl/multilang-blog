<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
            'name' => 'required|string|max:50',
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore($this->user->id)],
            'phone' => ['required', 'numeric', Rule::unique('users')->ignore($this->user->id)],
            'image' => 'nullable|image|max:1024',
            'role' => 'required|string',
            'status' => 'required|string',
            'password' => 'nullable|string|confirmed|min:8',
        ];
    }
}
