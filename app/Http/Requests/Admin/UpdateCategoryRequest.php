<?php

namespace App\Http\Requests\Admin;

use Astrotomic\Translatable\Validation\RuleFactory;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
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
            'slug' => 'nullable|string'
            , "$mainLocal.name" => 'required|string',
            "$mainLocal.meta" => ['nullable', "required_with:$mainLocal.name", 'string'],
            'category_id' => 'nullable|numeric|exists:categories,id'
        ];
        $ruleFactory = RuleFactory::make([
            '%name%' => 'nullable|string',
            '%meta%' => ['nullable', 'required_with:%name%', 'string'],
        ], null, null, null, $locals);

        return array_merge($mainRule, $ruleFactory);
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {

        $mainAttributes = ['slug' => __('slug')];

        $AttributeFactory = RuleFactory::make([
            '%name%' => __('name'),
            '%meta%' => __('meta'),
        ]);

        return array_merge($mainAttributes, $AttributeFactory);
    }
}
