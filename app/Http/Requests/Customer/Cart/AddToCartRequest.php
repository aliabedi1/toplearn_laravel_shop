<?php

namespace App\Http\Requests\Customer\Cart;

use Illuminate\Foundation\Http\FormRequest;

class AddToCartRequest extends FormRequest
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
            'color' => 'nullable|exists:product_colors,id',
            'guarantee' => 'nullable|exists:guarantees,id',
            'number' => 'required|numeric|min:1|max:5',
        ];
    }



    
    public function attributes()
    {
        return [

            'color' => 'رنگ',
            'guarantee' => 'گارانتی',
            'number' => 'تعداد',
        ];

    }
}
