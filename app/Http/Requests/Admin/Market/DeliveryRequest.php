<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
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
            'name'                  => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي.,?؟ ]+$/u',
            'amount'                => 'required|numeric',
            'delivery_time'         => 'required|integer',
            'delivery_time_unit'    => 'required|regex:/^[ا-یa-zA-Zء-ي., ]+$/u',
            'status'                => 'required|numeric|in:0,1',
        ];
    }


    public function attributes()
    {
        return [
            'name' => 'نام روش ارسال',
            'amount' => 'هزینه روش ارسال',
            'delivery_time_unit' => 'واحد زمان ارسال',
            'delivery_time' => 'زمان ارسال',
        ];

    }
}
