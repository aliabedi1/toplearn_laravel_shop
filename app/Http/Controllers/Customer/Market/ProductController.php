<?php

namespace App\Http\Controllers\Customer\Market;

use Illuminate\Http\Request;
use App\Models\Market\Comment;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Customer\Comment\AddCommentRequest;

class ProductController extends Controller
{
    

    public function product(Product $product)
    {
        $relatedProducts = Product::all();
        return view('customer.market.product.product' , compact('product','relatedProducts')); 
    }



    public function addComment(Product $product, AddCommentRequest $request)
    {
        // for keeping enters
        $inputs['body'] = str_replace(PHP_EOL , '<br/>' , $request->body);
        $inputs['author_id'] = Auth::user()->id;
        $inputs['commentable_id'] = $product->id;
        $inputs['commentable_type'] = Product::class;

        Comment::create($inputs);

        return back()->with('swal-success', 'نظر شما با موفقیت ثبت شد و پس از تایید ادمین در بخش نظرات نمایش داده میشود');


    }

    public function addToFavorite(Product $product)
    {
        if(Auth::check())
        {
            // changed the status
            $product->users()->toggle(Auth::user()->id);

            // check the status of the product and user
            if($product->users->contains(Auth::user()->id))
            {
                // added
                return response()->json(['status' => 1]);
            }
            else
            {
                // removed
                return response()->json(['status' => 2]);
            }

        }
        else
        {
            // its a guest user
            return response()->json(['status' => 3]);
        }
    }

}
