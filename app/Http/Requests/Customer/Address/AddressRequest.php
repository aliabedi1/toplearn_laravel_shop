<?php

namespace App\Http\Requests\Customer\Address;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'province_id'=>'required|exists:provinces,id',
            'city_id'=>'required|exists:cities,id',
            'address'=>'required|string',
            'i_am_recipient'=>'nullable|in:0,1',
            'postal_code'=>'required|numeric',
            'no'=>'required|numeric',
            'unit'=>'required|numeric',
            'first_name'=>'nullable|string',
            'last_name'=>'nullable|string',
            'mobile'=>'nullable|numeric',
        ];
    }

    
    public function attributes()
    {
        return [
            'province_id'=>'استان',
            'city_id'=>'شهر',
            'address'=>'ادرس',
            'i_am_recipient'=>'گیرنده خودم هستم',
            'no'=>'پلاک',
            'unit'=>'واحد',
            'first_name'=>'نام',
            'last_name'=>'نام خانوادگی',
            'mobile'=>'شماره موبایل',
        ];

    }

}
