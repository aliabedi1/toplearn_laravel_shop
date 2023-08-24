<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Market\CartItem;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    
    public function addressAndDelivery()
    {
        $user = Auth::user();
        $provinces = Province::all();
        // check cart
        $cartItems = CartItem::where('user_id',$user->id)->get();
        if(empty($cartItems->count()))
        {
            return redirect()->route('customer.sales-process.index');
        }
        $addresses = $user->addresses;
        return view('customer.sales-process.address-and-delivery',compact('cartItems','addresses','provinces'));
    }


    public function addAddress( $request)
    {
        
    }

    public function editAddress( $request, Address $address)
    {
        
    }

}
