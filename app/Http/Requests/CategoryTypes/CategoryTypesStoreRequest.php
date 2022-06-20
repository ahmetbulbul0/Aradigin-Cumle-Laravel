<?php

namespace App\Http\Requests\CategoryTypes;

use Illuminate\Foundation\Http\FormRequest;

class CategoryTypesStoreRequest extends FormRequest
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
            "name" => ["required", "string", "unique:category_types,name"],
        ];
    }
}
