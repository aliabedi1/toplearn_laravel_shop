<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class ProductColorRequest extends FormRequest
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
            'color_name'        =>'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,?؟ ]+$/u',
            'color'             =>'required|regex:/^#[a-fA-F0-9]{6}$/u',
            'price_increase'    =>'required|numeric',
        ];
    }

    
    public function attributes()
    {
        return [
            'color_name'        => 'نام رنگ',
            'color'             => 'رنگ',
            'price_increase'    => 'افزایش قیمت',
        ];

    }
}
