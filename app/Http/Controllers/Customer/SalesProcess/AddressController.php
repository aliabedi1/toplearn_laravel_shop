<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Address\AddressRequest;
use App\Models\Address;
use App\Models\Market\CartItem;
use App\Models\Market\Delivery;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    
    public function addressAndDelivery()
    {
        $user = Auth::user();
        $provinces = Province::all();
        $deliveries = Delivery::where('status',true)->get();
        // check cart
        $cartItems = CartItem::where('user_id',$user->id)->get();
        if(empty($cartItems->count()))
        {
            return redirect()->route('customer.sales-process.index');
        }
        $addresses = $user->addresses;
        return view('customer.sales-process.address-and-delivery',compact('deliveries','cartItems','addresses','provinces'));
    }


    public function addAddress(AddressRequest $request)
    {
        auth()->user()->addresses()->create($this->makeAddressValues($request->all()));
        return redirect()->route('customer.sales-process.address-and-delivery')->with('toast-success','ادرس با موفقیت اضافه شد');
    }

    public function editAddress(AddressRequest $request, Address $address)
    {
        $address->update($this->makeAddressValues($request->all()));
        return redirect()->route('customer.sales-process.address-and-delivery')->with('toast-success','ادرس با موفقیت ویرایش شد');    
    }

    public function makeAddressValues($inputs)
    {
        if(isset($inputs['i_am_recipient']))
        {
            $inputs['recipient_first_name'] = auth()->user()->first_name;
            $inputs['recipient_last_name'] = auth()->user()->last_name;
            $inputs['mobile'] = auth()->user()->mobile;
        }
        unset($inputs['i_am_recipient']);
        
        return $inputs;
    }

    public function getCity(Request $request)
    {
        
        $cities = Province::find($request->province)->cities;
        return response()->json($cities,200);
    }
    public function getDeliveryPrice(Request $request)
    {
        $delivery = Delivery::find($request->delivery);
        return response()->json($delivery,200);
    }

}
