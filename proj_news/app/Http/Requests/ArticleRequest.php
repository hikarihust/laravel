<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
{
    private $table = 'article';
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
        $condThumb = 'bail|required|image|max:500';
        $condName = "bail|required|between:5,100|unique:$this->table,name";

        if (! empty($this->id)) {
            $condThumb = 'bail|image|max:500';
            $condName .= ",$this->id";
        }
        return [
            'name' => $condName,
            'content' => 'bail|required|min:5',
            'status' => 'bail|in:active,inactive',
            'thumb' => $condThumb
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
