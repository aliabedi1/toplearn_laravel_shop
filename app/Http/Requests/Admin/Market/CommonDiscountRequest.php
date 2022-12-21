<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class CommonDiscountRequest extends FormRequest
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

            'title'                     => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,?؟ ]+$/u',
            'percentage'                => 'required|numeric|min:1|max:100',
            'discount_ceiling'          => 'required|numeric|min:0',
            'minimal_order_amount'      => 'required|numeric|min:0',
            'status'                    => 'required|numeric|in:0,1',
            'start_date'                => 'required|regex:/^[0-9]+$/u|min:0',
            'end_date'                  => 'required|regex:/^[0-9]+$/u|min:0',
            
        ];
    }

    public function attributes()
    {
        return [

            'title' => 'عنوان مناسبت',
            'percentage' => 'درصد تخفیف',
            'discount_ceiling' => 'حداکثر تخفیف',
            'minimal_order_amount' => 'حداقل تعداد سفارش برای اعمال',
            'start_date' => 'تاریخ شروع',
            'end_date' => 'تاریخ پایان',
        ];

    }
}
