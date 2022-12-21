<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class AmazingDiscountRequest extends FormRequest
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
            'percent'                   => 'required|numeric|min:1|max:100',
            'status'                    => 'required|numeric|in:0,1',
            'start_date'                => 'required|regex:/^[0-9]+$/u|min:0',
            'end_date'                  => 'required|regex:/^[0-9]+$/u|min:0',
        ];
    }

    
    public function attributes()
    {
        return [
            'product_id'            => 'نام کالا',
            'percent'               => 'درصد تخفیف',
            'start_date'            => 'تاریخ شروع',
            'end_date'              => 'تاریخ پایان',
        ];

    }
}
