<?php

namespace App\Http\Controllers\Admin\Market;

use Illuminate\Http\Request;
use App\Models\Market\Product;
use App\Http\Controllers\Controller;
use App\Models\Market\ProductGallery;
use App\Http\Services\Image\ImageService;
use App\Http\Requests\Admin\Market\ProductGalleryRequest;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        return view('admin.market.product.gallery.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.market.product.gallery.create',compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductGalleryRequest $request, Product $product, ImageService $imageService)
    {
        $inputs = $request->all();

        //image
        if($request->hasFile('image'))
        {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product-gallery');
        
            $result = $imageService->createIndexAndSave($request->file('image'));
            
            if($result === false)
            {
                return redirect()->route('admin.market.gallery.index',$product->id)->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        
        //end image
        $inputs['product_id'] = $product->id;
        $productGallery = ProductGallery::create($inputs);
        return redirect()->route('admin.market.gallery.index',$product->id)->with('swal-success', 'گالری جدید شما با موفقیت ثبت شد');
    
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, ProductGallery $productGallery)
    {
        $result = $productGallery->delete();
        return redirect()->route('admin.market.gallery.index' ,$product->id)->with('swal-success', 'گالری شما با موفقیت حذف شد');
      
    }
}
