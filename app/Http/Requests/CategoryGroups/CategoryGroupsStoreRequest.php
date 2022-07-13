<?php

namespace App\Http\Requests\CategoryGroups;

use Illuminate\Foundation\Http\FormRequest;

class CategoryGroupsStoreRequest extends FormRequest
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
            "main" => ["required", "integer", "exists:categories,no"],
            "sub1" => ["nullable", "integer", "exists:categories,no"],
            "sub2" => ["nullable", "integer", "exists:categories,no"],
            "sub3" => ["nullable", "integer", "exists:categories,no"],
            "sub4" => ["nullable", "integer", "exists:categories,no"],
            "sub5" => ["nullable", "integer", "exists:categories,no"],
            "link_url" => ["required", "string", "unique:category_group_urls,link_url"],
        ];
    }
}
