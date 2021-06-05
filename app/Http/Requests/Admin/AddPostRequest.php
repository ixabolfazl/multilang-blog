<?php

namespace App\Http\Requests\Admin;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest
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
        $mainLocal = array_shift($locals);

        $mainRule = [
            'slug' => 'required|regex:/^[a-z0-9-]+$/|unique:posts',
            'image' => 'required|max:1024',
            'category' => 'required|array',
            "$mainLocal.title" => 'required|string',
            "$mainLocal.description" => 'required|string',
            "$mainLocal.body" => 'required|string',
            "$mainLocal.meta" => 'nullable|string',
            "$mainLocal.keywords" => "nullable|required_with:$mainLocal.meta|string",
        ];
        $ruleFactory = RuleFactory::make([
            "%title%" => 'nullable|string',
            "%description%" => 'nullable|string',
            "%body%" => 'nullable|string',
            "%meta%" => 'nullable|string',
            "%keywords%" => ['nullable', "required_with:%meta%", 'string'],
        ], null, null, null, $locals);

        return (array_merge($mainRule, $ruleFactory));
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        $mainAttributes = [
            'slug' => __('slug'),
            'image' => __('image'),
            'category' => __('category'),
        ];

        $AttributeFactory = RuleFactory::make([
            '%title%' => __('title'),
            '%description%' => __('description'),
            '%body%' => __('text'),
            '%meta%' => __('meta'),
            '%keywords%' => __('Keywords'),
        ]);

        return array_merge($mainAttributes, $AttributeFactory);
    }
}
