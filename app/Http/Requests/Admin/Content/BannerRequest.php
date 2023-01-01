<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
        if($this->isMethod('post'))
        {
            return [
                'title' => 'required|max:150|min:2|regex:/^[ا-ی0-9\-۰-۹ء-ي., ]+$/u',
                'url' => 'required|max:500|min:5|regex:/^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-z-A-Z-0-9]\.[a-zA-Z]{2,}+$/u',
                'status' => 'required|numeric|in:0,1',
                'image' => 'required|image|mimes:png,jpg,jpeg,gif',
                'position' => 'required|numeric',
            ];
        }
        else
        {
            return [
                'title' => 'required|max:150|min:2|regex:/^[ا-ی0-9\-۰-۹ء-ي., ]+$/u',
                'url' => 'required|max:500|min:5|regex:/^[a-zA-Z0-9][a-zA-Z0-9-]{1,61}[a-z-A-Z-0-9]\.[a-zA-Z]{2,}+$/u',
                'status' => 'required|numeric|in:0,1',
                'image' => 'image|mimes:png,jpg,jpeg,gif',
                'position' => 'required|numeric',
            ];
        }
    }

    
    public function attributes()
    {
        return [
            'title' => 'عنوان بنر',
            'url' => 'آدرس',
            'image' => 'تصویر',
            'position' => 'موقعیت',
        ];

    }
}
