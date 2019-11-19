<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;

class FangOwnerRequest extends FormRequest
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
        $this->checkBoth();
        return [
            "name"=>"required",
            "age"=>"between:1,100",
            "email"=>"email",
            "phone"=>"checkphone",
            "card"=>"checkcard",
            "address"=>"required"
        ];
    }

    public function messages()
    {
       return [
         'card.checkcard'=>"身份证格式不正确",
         'phone.checkphone'=>"手机号格式不正确",
       ];
    }

    public function checkBoth(){
        Validator::extend('checkphone', function($attribute, $value, $parameters, $validator) {
            return preg_match('/^1[3,9]\d{9}$/',$value);
        });
        Validator::extend('checkcard', function($attribute, $value, $parameters, $validator) {
            $value = trim($value);
            return preg_match('/\d{17}[\dx]+$/',$value) && (strlen($value) == 18);
        });
    }
}
