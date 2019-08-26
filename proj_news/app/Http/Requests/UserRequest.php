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
        $condUserName = "bail|required|between:5,100|unique:$this->table,username";
        $condEmail = "bail|required|email|unique:$this->table,email";
        $condAvatar = 'bail|required|image|max:500';
        $condPass = 'bail|required|between:5,100|confirmed';

        if (! empty($this->id)) {
            $condUserName .= ",$this->id";
            $condEmail .= ",$this->id";
            $condAvatar = 'bail|image|max:500';
        }
        return [
            'username' => $condUserName,
            'email' => $condEmail,
            'fullname' => 'bail|required|min:5',
            'status' => 'bail|in:active,inactive',
            'level' => 'bail|in:admin,member',
            'password' => $condPass,
            'avatar' => $condAvatar
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
