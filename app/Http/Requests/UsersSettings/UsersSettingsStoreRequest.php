<?php

namespace App\Http\Requests\UsersSettings;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsersSettingsStoreRequest extends FormRequest
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
        $availableThemes = [
            "dark",
            "light"
        ];

        return [
            "user_no" => ["required", "integer", "exists:users,no"],
            "dashboard_theme" => ["required", "string", Rule::in($availableThemes)],
            "website_theme" => ["required", "string", Rule::in($availableThemes)],
        ];
    }
}
