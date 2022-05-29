<?php

namespace App\Http\Requests\Visitors;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class VisitorsIndexRequest extends FormRequest
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
            "ipAZ",
            "ipZA",
            "browserAZ",
            "browserZA",
            "lastLoginTimeAZ",
            "lastLoginTimeZA",
            "websiteThemeAZ",
            "websiteThemeZA"
        ];

        return [
            "is_banned" => ["nullable", "boolean"],
            "list_type" => ["nullable", "string", Rule::in($listTypeValues)],
            "ip" => ["nullable", "string"],
            "browser" => ["nullable", "string"],
            "website_theme" => ["nullable", "string"],
        ];
    }
}
