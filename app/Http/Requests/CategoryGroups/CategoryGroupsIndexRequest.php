<?php

namespace App\Http\Requests\CategoryGroups;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryGroupsIndexRequest extends FormRequest
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
        $listTypeValues = [
            "no09",
            "no90",
            "mainAZ",
            "mainZA",
            "sub1AZ",
            "sub1ZA",
            "sub2AZ",
            "sub2ZA",
            "sub3AZ",
            "sub3ZA",
            "sub4AZ",
            "sub4ZA",
            "sub5AZ",
            "sub5ZA",
            "link_urlAZ",
            "link_urlZA"
        ];

        return [
            "is_deleted" => ["nullable", "boolean"],
            "list_type" => ["nullable", "string", Rule::in($listTypeValues)],
            "main" => ["nullable", "integer", "exists:categories,no"],
            "sub1" => ["nullable", "integer", "exists:categories,no"],
            "sub2" => ["nullable", "integer", "exists:categories,no"],
            "sub3" => ["nullable", "integer", "exists:categories,no"],
            "sub4" => ["nullable", "integer", "exists:categories,no"],
            "sub5" => ["nullable", "integer", "exists:categories,no"],
            "link_url" => ["nullable", "integer", "exists:category_group_urls,no"]
        ];
    }
}
