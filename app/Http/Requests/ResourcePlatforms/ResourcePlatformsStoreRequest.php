<?php

namespace App\Http\Requests\ResourcePlatforms;

use Illuminate\Foundation\Http\FormRequest;

class ResourcePlatformsStoreRequest extends FormRequest
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
            "name" => ["required", "string", "unique:resource_platforms,name"],
            "main_url" => ["required", "string", "unique:resource_platforms,main_url"],
        ];
    }
}
