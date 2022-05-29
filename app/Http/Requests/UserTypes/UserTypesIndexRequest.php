<?php

namespace App\Http\Requests\UserTypes;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserTypesIndexRequest extends FormRequest
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
            'nameAZ',
            'nameZA',
        ];

        return [
            "is_deleted" => ["nullable", "boolean"],
            "list_type" => ["nullable", "string", Rule::in($listTypeValues)],
            "name" => ["nullable", "string"]
        ];
    }
}
