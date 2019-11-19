<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Validator;
class FangAttrRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *  默认不授权
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
    public function rules(){
        $this->fileName();
        return [
            'name'=>"required",
            'field_name'=>"file_name",
        ];
    }

    public function messages()
    {
        return [
          'field_name.file_name'=>"选择顶级属性请一定要填写对应的字段名称",
          'name.required'=>"房源属性名称必填",
        ];
    }

    public function fileName(){
        Validator::extend('file_name', function($attribute, $value, $parameters, $validator) {
            $pid = request()->get('pid');
            $bool = $pid == 0 ? false:true;
            $reg = "/\w+/";
            return $bool || preg_match($reg,$value);
        });
    }
}
