<?php

namespace App\Http\Requests\ResourceUrls;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ResourceUrlsIndexRequest extends FormRequest
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
            "news_noAZ",
            "news_noZA",
            "resource_platformAZ",
            "resource_platformZA",
            "urlAZ",
            "urlZA"
        ];

        return [
            "is_deleted" => ["nullable", "boolean"],
            "list_type" => ["nullable", "string", Rule::in($listTypeValues)],
            "news_no" => ["nullable", "integer", "exists:news,no"],
            "resource_platform" => ["nullable", "integer", "exists:resource_platforms,no"],
            "url" => ["nullable", "string"],
        ];
    }
}
