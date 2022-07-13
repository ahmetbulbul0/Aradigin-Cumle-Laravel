<?php

namespace App\Http\Requests\CategoryGroupUrls;

use Illuminate\Foundation\Http\FormRequest;

class CategoryGroupUrlsStoreRequest extends FormRequest
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
            "group_no" => ["required", "integer", "exists:category_groups,no", "unique:category_group_urls,group_no"],
            "link_url" => ["required", "string", "unique:category_group_urls,link_url"],
        ];
    }
}
