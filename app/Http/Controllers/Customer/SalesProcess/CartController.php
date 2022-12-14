<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Market\CartItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Customer\Cart\AddToCartRequest;

class CartController extends Controller
{


    public function cart()
    {
        
    }


    public function updateCart()
    {
        
    }


    public function addToCart(Product $product, AddToCartRequest $request)
    {
        if(Auth::check())
        {
            $cartItems = CartItem::where('product_id', $product->id)->where('user_id', auth()->user()->id)->get();
            
            if(!isset($request->color))
            {
                $request->color = null;
                
            }

            if(!isset($request->guarantee))
            {
                $request->guarantee = null;
                
            }

            foreach ($cartItems as $cartItem)
            {
                if($cartItem->color_id == $request->color && $cartItem->guarantee_id == $request->guarantee)
                {
                    // if the same product selected number is not in the cart update it
                    if($cartItem->number != $request->number)
                    {
                        $cartItem->update(['numer' => $request->number]);
                    }
                    return back();
                }
            }

            $inputs['color_id'] = $request->color;
            $inputs['guarantee_id'] = $request->guarantee;
            $inputs['user_id'] = auth()->user()->id;
            $inputs['product_id'] = $product->id;

            CartItem::craete($inputs);
            return back();
        }
        else
        {
            return redirect()->route('auth.customer.login-register-form');
        }
    }


    public function removeFromCart()
    {
        
    }
}
