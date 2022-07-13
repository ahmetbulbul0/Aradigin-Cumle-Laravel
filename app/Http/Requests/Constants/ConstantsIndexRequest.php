<?php

namespace App\Http\Requests\Constants;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ConstantsIndexRequest extends FormRequest
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
            'keyAZ',
            'keyZA',
            'valueAZ',
            'valueZA'
        ];

        return [
            "list_type" => ["nullable", "string", Rule::in($listTypeValues)],
            "key" => ["nullable", "string"],
            "value" => ["nullable", "integer"],
        ];
    }
}
