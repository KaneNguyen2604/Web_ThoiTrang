<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CateRequest extends FormRequest
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
        'txtCateName' => 'required|unique:cates,name' // hieu roi chu Da em cam on anh nhieu a, you are welcome !!
        ];
    }
    public function messages () {
         return [
        'txtCateName.required' => 'please enter name category',
        'txtCateName.required' => 'this name category is exist'
        ];
    }
}
