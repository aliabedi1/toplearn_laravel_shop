<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    
    public function addressAndDelivery()
    {
        // check profile
        $user = Auth::user();
        if(empty($user->mobile) || empty($user->first_name) || empty($user->last_name) || empty($user->nationa_code))
        {
            return redirect()->route('customer.sales-process.profile-compilation')
        }
        return view();
    }


    public function addAddress()
    {
        
    }

}
