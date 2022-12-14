<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\ProductRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Market\Brand;
use App\Models\Market\Product;
use App\Models\Market\ProductCategory;
use App\Models\Market\ProductMeta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.market.product.index' , compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = ProductCategory::all();
        $brands = Brand::all();
        return view('admin.market.product.create',compact( 'productCategories' , 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request , ImageService $imageService)
    {
        $inputs = $request->all();

        //image
        if($request->hasFile('image'))
        {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'product');
        
            $result = $imageService->createIndexAndSave($request->file('image'));
            
            if($result === false)
            {
                return redirect()->route('admin.market.product.index')->with('swal-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        
        //end image

        
        //date fixed
        $realTimestampStart = substr($request->published_at, 0, 10);
        $inputs['published_at'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        // if creating meta had problem dont create product
       DB::transaction(function($request,$inputs){

            $product = Product::create($inputs);

            $metas = array_combine($request->meta_key,$request->meta_value);

            foreach($metas as $key => $value) 
            {
                if($key == null)
                {
                    continue;
                }

                $meta = ProductMeta::create([
                    'meta_key' => $key,
                    'meta_value' => $value,
                    'product_id' => $product->id,
                ]);
            }

       });




        return redirect()->route('admin.market.product.index')->with('swal-success', 'کالای جدید شما با موفقیت ثبت شد');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function status(Product $product){

        $product->status = $product->status == 0 ? 1 : 0;
        $result = $product->save();
        if($result){
                if($product->status == 0){
                    return response()->json(['status' => true, 'checked' => false]);
                }
                else{
                    return response()->json(['status' => true, 'checked' => true]);
                }
        }
        else{
            return response()->json(['status' => false]);
        }

    }

    public function marketable(Product $product){

        $product->marketable = $product->marketable == 0 ? 1 : 0;
        $result = $product->save();
        if($result){
                if($product->marketable == 0){
                    return response()->json(['status' => true, 'checked' => false]);
                }
                else{
                    return response()->json(['status' => true, 'checked' => true]);
                }
        }
        else{
            return response()->json(['status' => false]);
        }

    }
}
