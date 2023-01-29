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
        $inputs = $requset->all();
        $user->update($inputs);
        
        return redirect()->route('customer.sales-process.address-and-delivery');
        
    }
}
