<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class NewsStoreRequest extends FormRequest
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
            "content" => ["required", "string", "unique:news,content"],
            "author" => ["required", "integer", "exists:users,no"],
            "category" => ["required", "integer", "exists:category_groups,no"],
            "resource_platform" => ["required", "integer", "exists:resource_platforms,no"],
            "resource_url" => ["required", "string", "unique:resource_urls,url"],
            "publish_date" => ["required", "integer"],
            "link_url" => ["required", "string", "unique:news,link_url"],
        ];
    }
}
