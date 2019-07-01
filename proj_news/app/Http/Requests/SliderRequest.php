<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        $condThumb = 'bail|required|image|max:500';
        if (! empty($this->id)) {
            $condThumb = 'bail|image|max:500';
        }
        return [
            'name' => 'bail|required|min:5',
            'description' => 'bail|required|min:5',
            'link' => 'bail|required|min:5|url',
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
