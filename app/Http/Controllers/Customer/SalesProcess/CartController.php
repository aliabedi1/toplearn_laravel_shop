<?php

namespace App\Http\Controllers\Customer\SalesProcess;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Models\Market\CartItem;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Customer\Cart\AddToCartRequest;
use App\Http\Requests\Customer\Cart\UpdateCartRequest;

class CartController extends Controller
{


    public function cart()
    {
        if (Auth::check()) 
        {
            $cartItems = CartItem::where('user_id',Auth::user()->id)->get();
            $relatedProducts = Product::all();
            return view('customer.sales-process.cart',compact('cartItems','relatedProducts'));
        } 
        else 
        {
            return redirect()->route('auth.customer.login-register-form');
        }
        
    }


    public function updateCart(UpdateCartRequest $request)
    {
        $inputs = $request->all();
        
        $cartItems = cartItem::where('user_id',auth()->user()->id)->get();
        foreach($cartItems as $cartItem)
        {
            if (isset($inputs['number'][$cartItem->id])) 
            {
                $cartItem->update(['number' => $inputs['number'][$cartItem->id]]);
            }
        }
        
        return redirect()->route('customer.sales-process.address-and-delivery');
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
                        $cartItem->update(['number' => $request->number]);
                    }
                    return back();
                }
            }

            $inputs['color_id'] = $request->color;
            $inputs['guarantee_id'] = $request->guarantee;
            $inputs['user_id'] = auth()->user()->id;
            $inputs['product_id'] = $product->id;

            CartItem::create($inputs);
            return back()->with('toast-success','محصول مورد نظر با موفقیت به سبد خرید اضافه شد');
        }
        else
        {
            return redirect()->route('auth.customer.login-register-form');
        }
    }


    public function removeFromCart(CartItem $cartItem)
    {
        if($cartItem->user_id == auth()->user()->id)
        {
            $cartItem->forceDelete();
        }
        return back();
    }
}
