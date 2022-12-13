<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class RoleRequest extends FormRequest
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

        $route = Route::current();
        if ($route->getName() === 'admin.user.role.store')
        {
            return [
            
            'name' => 'required|max:120|min:2',
            'description' => 'required|max:200|min:2',
            'permissions.*' => 'exists:permissions,id',

            ];
        }
        elseif($route->getName() === 'admin.user.role.update')
        {
            return [
                'name' => 'required|max:120|min:2',
                'description' => 'required|max:200|min:2',
            ];
        } 
        elseif($route->getName() === 'admin.user.role.permission-update')
        {
            return [
                
                'permissions.*' => 'exists:permissions,id',
            ];
        }

        
     
    }

    public function attributes()
    {
        return [
            'name' => 'نام نقش',
            'permissions.*' => 'دسترسی',
        ];
    }


}
