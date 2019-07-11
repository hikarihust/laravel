<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    private $table = 'category';
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
        $condName = "bail|required|between:5,100|unique:$this->table,name";

        if (! empty($this->id)) {
            $condName .= ",$this->id";
        }
        return [
            'name' => $condName,
            'status' => 'bail|in:active,inactive',
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
