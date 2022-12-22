<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class CopanRequest extends FormRequest
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

            'code'                      => 'required|max:150|min:2|regex:/^[a-zA-Z0-9\-.]+$/u',
            'amount'                    => ['required', 'numeric',(request()->amount_type == '0') ? 'max:100' : '' , 'min:0'],
            'amount_type'               => 'required|numeric|in:0,1',
            'discount_ceiling'          => 'required|numeric|min:0',
            'type'                      => 'required|numeric|in:0,1',
            'user_id'                   => 'required_if:type,==,1|min:1|regex:/^[0-9]+$/u|exists:users,id',
            'status'                    => 'required|numeric|in:0,1',
            'start_date'                => 'required|regex:/^[0-9]+$/u|min:0',
            'end_date'                  => 'required|regex:/^[0-9]+$/u|min:0',
        
        ];
    }


    public function attributes()
    {
        return [
            
            'code'                  => 'کد کوپن',
            'user_id'               => 'نام کاربر',
            'amount'                => 'درصد/مقدار',
            'amount_type'           => 'نوع درصد/مقدار',
            'type'                  => 'نوع کوپن',
            'discount_ceiling'      => 'حداکثر تخفیف',
            'start_date'            => 'تاریخ شروع',
            'end_date'              => 'تاریخ پایان',
        ];

    }

}
