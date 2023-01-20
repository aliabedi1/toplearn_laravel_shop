<?php

namespace App\Http\Requests\Customer\Cart;

use App\Models\Market\CartItem;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCartRequest extends FormRequest
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
            'number.*'  => 'required',
            'number' => [
                'required',
                'array',
                function($attribute, $value, $fail) {
                    // index of array
                    $ids = array_keys($value);
                    // query to check if array keys (cart item) is valid
                    $isValid = CartItem::whereIn('id', $ids)->first();
                    if ($isValid == null)
                    {
                        return $fail('.کالای مورد نظر در سبد کالا وجود ندارد');  // -> "cart item is invalid"
                    }
                }
            ],
        ];
    }
    
    public function attributes()
    {
        return[
            'number' => 'تعداد کالا',
        ];
    }
}
