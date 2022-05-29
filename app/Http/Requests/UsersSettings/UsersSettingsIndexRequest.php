<?php

namespace App\Http\Requests\UsersSettings;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UsersSettingsIndexRequest extends FormRequest
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
            'no09',
            'no90',
            'userNo09',
            'userNo90',
            'dashboardThemeAZ',
            'dashboardThemeZA',
            'websiteThemeAZ',
            'websiteThemeZA'
        ];

        return [
            "is_deleted" => ["nullable", "boolean"],
            "list_type" => ["nullable", "string", Rule::in($listTypeValues)],
            "user_no" => ["nullable", "integer", "exists:users,no"],
            "dashboard_theme" => ["nullable", "string"],
            "website_theme" => ["nullable", "string"],
        ];
    }
}
