<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use Illuminate\Http\Request;
use App\Models\Market\CartItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Customer\ProfileCompletion\UpdateProfileRequest;

class ProfileCompletionController extends Controller
{
    
    public function profileCompletion()
    {
        if(Auth::check())
        {
            
            $user = Auth::user();
            $cartItems = CartItem::where('user_id',$user->id)->get();
            return view('customer.sales-process.profile-completion', compact('cartItems','user'));
        }
        return redirect()->route('auth.customer.login-register');
    }
    
    public function update(UpdateProfileRequest $requset)
    {
        $user = Auth::user();


        // national code
        $nationalCode = convertArabicToEnglishNumber($requset->national_code);
        $nationalCode = convertPersianToEnglishNumber($nationalCode);


        // setting inputs
        $inputs = [
            'first_name' => $requset->first_name,
            'last_name' => $requset->last_name,
            'national_code' => $nationalCode,
        ];


        // mobile
        if(isset($requset->mobile) && empty($user->mobile))
        {
            $mobile = convertArabicToEnglishNumber($requset->mobile);
            $mobile = convertPersianToEnglishNumber($mobile);

            if(preg_match('/^(\+98|98|0)9\d{9}$/',$mobile))
            {
                // entered mobile
                $type = 0; 
            }

            // all mobile numbers are in an format like 9** *** ****
            $mobile = ltrim($mobile,'0'); //delete left 0 from entered string
            $mobile = substr($mobile,0 , 2) == '98' ? substr($mobile, 2) : $mobile; //remove 98 from begining of string
            $mobile = str_replace('+98' , '' ,$mobile); // if entered sting has +98 remove it)

            $inputs['mobile'] = $mobile;
        }
        else
        {
            $errorText = 'فرمت شماره موبایل درست نیست';
            return redirect()->back()->withErrors(['mobile' , $errorText]);
        }


        // email
        if(isset($requset->email) && empty($user->email))
        {
            $email = convertArabicToEnglishNumber($requset->email);
            $email = convertPersianToEnglishNumber($email);

            $inputs['email'] = $email;
        }

        $inputs = array_filter($inputs);

        if()

        $user->update($inputs);
        
        return redirect()->route('customer.sales-process.address-and-delivery');
        
    }
}
