<?php

namespace App\Http\Requests\Customer\ProfileCompletion;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'first_name' => "sometimes|required",
            'last_name' => "sometimes|required",
            'national_code' => "nullable|unique:users,national_code",
            'mobile' => "sometimes|required|min:10|max:13|unique:users,mobile",
        ];
        
    }
}
