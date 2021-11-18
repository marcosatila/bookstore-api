<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'name_product'=>'bail|required|min:3|max:150',
            'price'=>'bail|required',
            'pages'=>'bail|required|integer',
            'name_author'=>'bail|required|min:3|max:200',

        ];
    }
}
