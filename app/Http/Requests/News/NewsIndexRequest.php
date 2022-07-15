<?php

namespace App\Http\Requests\News;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class NewsIndexRequest extends FormRequest
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
            "contentAZ",
            "contentZA",
            "authorAZ",
            "authorZA",
            "categoryAZ",
            "categoryZA",
            "resource_platformAZ",
            "resource_platformZA",
            "resource_urlAZ",
            "resource_urlZA",
            "publish_date09",
            "publish_date90",
            "write_time09",
            "write_time90",
            "listing09",
            "listing90",
            "reading09",
            "reading90",
            "link_urlAZ",
            "link_urlZA"
        ];

        return [
            "is_deleted" => ["nullable", "boolean"],
            "list_type" => ["nullable", "string", Rule::in($listTypeValues)],
            "content" => ["nullable", "string"],
            "author" => ["nullable", "integer", "exists:users,no"],
            "category" => ["nullable", "integer", "exists:category_groups,no"],
            "resource_platform" => ["nullable", "integer", "exists:resource_platforms,no"],
            "resource_url" => ["nullable", "integer", "exists:resource_urls,no"],
            "listing" => ["nullable", "integer"],
            "reading" => ["nullable", "integer"],
            "link_url" => ["nullable", "string"]
        ];
    }
}
