<?php

namespace App\Http\Requests\ResourceUrls;

use Illuminate\Foundation\Http\FormRequest;

class ResourceUrlsStoreRequest extends FormRequest
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
            "news_no" => ["required", "integer", "exists:news,no"],
            "resource_platform" => ["required", "integer", "exists:resource_platforms,no"],
            "url" => ["required", "string", "unique:resource_urls,url"],
        ];
    }
}
