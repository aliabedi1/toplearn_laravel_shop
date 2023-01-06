<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if($this->isMethod('post')){
            return [
                'name' => 'required|max:150|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'introduction' => 'required|max:100000|min:5',
                'image' => 'required|image|mimes:png,jpg,jpeg',
                'status' => 'required|numeric|in:0,1',
                'marketable' => 'required|numeric|in:0,1',
                'brand_id' => 'required|min:1|max:10000000000|regex:/^[0-9]+$/u|exists:brands,id',
                'category_id' => 'required|min:1|max:10000000000|regex:/^[0-9]+$/u|exists:product_categories,id',
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'weight'  => 'required|numeric',
                'weight_unit' => 'required|max:150|min:2|regex:/^[ا-یء-ي ]+$/u',
                'length'  => 'required|numeric',
                'width'  => 'required|numeric',
                'height'  => 'required|numeric',
                'price'  => 'required|numeric',
                'published_at'  => 'required|numeric',
                'meta_key.*'  => 'required',
                'meta_value.*'  => 'required',
            ];
        }
        else{
            return [
                'name' => 'required|max:150|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'introduction' => 'required|max:100000|min:5',
                'image' => 'image|mimes:png,jpg,jpeg',
                'status' => 'required|numeric|in:0,1',
                'marketable' => 'required|numeric|in:0,1',
                'brand_id' => 'required|min:1|max:10000000000|regex:/^[0-9]+$/u|exists:brands,id',
                'category_id' => 'required|min:1|max:10000000000|regex:/^[0-9]+$/u|exists:product_categories,id',
                'tags' => 'required|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'weight'  => 'required|numeric',
                'weight_unit' => 'required|max:150|min:2|regex:/^[ا-یء-ي ]+$/u',
                'length'  => 'required|numeric',
                'width'  => 'required|numeric',
                'height'  => 'required|numeric',
                'price'  => 'required|numeric',
                'published_at'  => 'required|regex:/^[0-9]+$/u',
                'meta_key.*'  => 'required',
                'meta_value.*'  => 'required',
            
            ];
        }
    }



    public function attributes()
    {
        return [
            'name' => 'نام کالا',
            'introduction' => 'توضیحات کالا',
            'marketable' => 'وضعیت فروش',
            'brand_id' => 'برند',
            'category_id' => 'دسته بندی',
            'weight' => 'وزن',
            'weight_unit' => 'واحد وزن',
            'length' => 'طول',
            'width' => 'عرض',
            'height' => 'ارتفاع',
            'price' => 'قیمت',
            'meta_key.*' => 'ویژگی',
            'meta_value.*' => 'مقدار',
        ];

    }


}
