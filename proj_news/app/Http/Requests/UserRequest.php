<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    private $table = 'user';
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
        $condAvatar = 'bail|required|image|max:500';
        $condUserName = "bail|required|between:5,100|unique:$this->table,username";
        $condEmail = "bail|required|email|unique:$this->table,email";

        if (! empty($this->id)) {
            $condAvatar = 'bail|image|max:500';
            $condUserName .= ",$this->id";
            $condEmail .= ",$this->id";
        }
        return [
            'username' => $condUserName,
            'email' => $condEmail,
            'fullname' => 'bail|required|min:5',
            'status' => 'bail|in:admin,member',
            'thumb' => $condAvatar
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => 'Name không được rỗng',
            // 'name.min' => 'Name :input chiều dài phải có ít nhất :min ký tự',
        ];
    }

    public function attributes()
    {
        return [
            // 'description' => 'Field Description: ',
        ];
    }
}
