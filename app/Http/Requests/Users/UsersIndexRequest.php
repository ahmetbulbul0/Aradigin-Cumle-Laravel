<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UsersIndexRequest extends FormRequest
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
            'fullNameAZ',
            'fullNameZA',
            'usernameAZ',
            'usernameZA',
            'typeAZ',
            'typeZA',
            'settingsAZ',
            'settingsZA'
        ];

        return [
            "is_deleted" => ["nullable", "boolean"],
            "list_type" => ["nullable", "string", Rule::in($listTypeValues)],
            "type" => ["nullable", "integer", "exists:user_types,no"],
            "settings" => ["nullable", "integer", "exists:users_settings,no"],
            "full_name" => ["nullable", "string"],
            "username" => ["nullable", "string"],
            "password" => ["nullable", "string"],
        ];
    }
}
