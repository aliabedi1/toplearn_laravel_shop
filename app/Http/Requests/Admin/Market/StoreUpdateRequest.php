<?php

namespace App\Http\Requests\Admin\Market;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateRequest extends FormRequest
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
            'marketable_number'=>'required|numeric|min:1',
            'frozen_number'=>'required|numeric|min:1',
            'sold_number'=>'required|numeric|min:1',
        ];
    }

    
    public function attributes()
    {
        return [
            'marketable_number' => 'تعداد قابل فروش',
            'frozen_number' => 'تعداد رزرو شده',
            'sold_number' => 'تعداد فروخته شده',
        ];

    }
}
