<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class CategoryValueRequest extends FormRequest
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
            'product_id'                => 'nullable|min:1|regex:/^[0-9]+$/u|exists:products,id',
            'category_attribute_id'     => 'nullable|min:1|regex:/^[0-9]+$/u|exists:category_attributes,id',
            'value'                     => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,?؟ ]+$/u',
            'price_increase'            => 'required|numeric',
            'type'                      => 'required|numeric|in:0,1',

        ];
    }


    public function attributes()
    {
        return [
            'product_id'            => 'نام کالا',
            'price_increase'        => 'افزایش قیمت',
            'category_attribute_id' => 'واحد زمان ارسال',
            'value'                 => 'مقدار ویژگی',
            'type'                  => 'نوع نمایش',
        ];

    }
    
}
