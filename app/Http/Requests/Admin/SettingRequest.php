<?php

namespace App\Http\Requests\Admin;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
        $locals = (config('translatable.locales'));
        return (RuleFactory::make([
            "%site_name%" => 'required|string',
            "%description%" => 'required|string',
            "%logo_url%" => 'nullable|max:1024',
            "%breaking_title_category%" => 'required|exists:categories,id',
            "%phone_number%" => 'required|string',
            "%email%" => 'required|email',
            "%address%" => 'required|string',
        ], null, null, null, $locals));


    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return RuleFactory::make([
            '%site_name%' => __('Title'),
            '%description%' => __('Description'),
            '%breaking_title_category%' => __('Category'),
            '%phone_number%' => __('Phone Number'),
            '%email%' => __('Email'),
            '%address%' => __('Address'),
        ]);
    }
}
