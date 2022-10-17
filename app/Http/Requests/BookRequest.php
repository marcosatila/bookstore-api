<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'name_product'=>'required|min:3|max:150',
            'price'=>'required',
            'pages'=>'required|integer',
            'name_author'=>'required|min:4|max:150',
            'name_publisher'=> 'required',

        ];
    }
}
