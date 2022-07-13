<?php

namespace App\Http\Requests\CategoryGroupUrls;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryGroupUrlsIndexRequest extends FormRequest
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
            "group_no09",
            "group_no90",
            "link_urlAZ",
            "link_urlZA"
        ];

        return [
            "is_deleted" => ["nullable", "boolean"],
            "list_type" => ["nullable", "string", Rule::in($listTypeValues)],
            "group_no" => ["nullable", "integer", "exists:category_groups,no"],
            "link_url" => ["nullable", "string"],
        ];
    }
}
