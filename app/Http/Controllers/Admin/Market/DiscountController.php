<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\AmazingDiscountRequest;
use App\Http\Requests\Admin\Market\CommonDiscountRequest;
use App\Models\Market\AmazingDiscount;
use App\Models\Market\CommonDiscount;
use App\Models\Market\Copan;
use App\Models\Market\Product;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function copan()
    {
        return view('admin.market.discount.copan');
    }

    
    public function copanCreate()
    {
        return view('admin.market.discount.copan-create');
    }

    
    public function copanStore()
    {
        return view('admin.market.discount.copan-create');
    }


    public function copanDestroy(Copan $copan)
    {
        $result = $copan->delete();
        return redirect()->route('admin.market.discount.copan')->with('swal-success', 'تخفیف با موفقیت حذف شد');

    }


    public function copanStatus(Copan $copan)
    {

        $copan->status = $copan->status == 0 ? 1 : 0;
        $result = $copan->save();
        if($result){
                if($copan->status == 0){
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





    public function commonDiscount()
    {
        $commonDiscounts = CommonDiscount::all();
        return view('admin.market.discount.common' , compact('commonDiscounts'));
    }


    public function commonDiscountCreate()
    {
        return view('admin.market.discount.common-create');
    }


    public function commonDiscountStore(CommonDiscountRequest $request)
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampStart = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        $result = CommonDiscount::create($inputs);

        return redirect()->route('admin.market.discount.commonDiscount')->with('swal-success', 'تخفیف جدبد شما با موفقیت ثبت شد');


    }


    public function commonDiscountDestroy(CommonDiscount $commonDiscount)
    {
        $result = $commonDiscount->delete();
        return redirect()->route('admin.market.discount.commonDiscount')->with('swal-success', 'تخفیف با موفقیت حذف شد');
   
    }


    public function commonDiscountStatus(CommonDiscount $commonDiscount)
    {
        
        $commonDiscount->status = $commonDiscount->status == 0 ? 1 : 0;
        $result = $commonDiscount->save();
        if($result){
                if($commonDiscount->status == 0){
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





    public function amazingDiscount()
    {
        $amazingDiscounts = AmazingDiscount::all();
        return view('admin.market.discount.amazing' , compact('amazingDiscounts'));
    
    }


    public function amazingDiscountCreate()
    {
        $products = Product::all();
        return view('admin.market.discount.amazing-create' , compact('products'));
    
    }


    public function amazingDiscountStore(AmazingDiscountRequest $request)
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampStart = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        $result = AmazingDiscount::create($inputs);

        return redirect()->route('admin.market.discount.amazingDiscount')->with('swal-success', 'تخفیف شگفت انگیز جدبد شما با موفقیت ثبت شد');

    }



    public function amazingDiscountEdit(AmazingDiscount $amazingDiscount)
    {
        $products = Product::all();
        return view('admin.market.discount.amazing-edit',compact('amazingDiscount','products'));
    }



    public function amazingDiscountUpdate(AmazingDiscountRequest $request, AmazingDiscount $amazingDiscount )
    {
        $inputs = $request->all();
        //date fixed
        $realTimestampStart = substr($request->start_date, 0, 10);
        $inputs['start_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);
        $realTimestampStart = substr($request->end_date, 0, 10);
        $inputs['end_date'] = date("Y-m-d H:i:s", (int)$realTimestampStart);

        $amazingDiscount ->update($inputs);

        return redirect()->route('admin.market.discount.amazingDiscount')->with('swal-success', 'تخفیف شگفت انگیز شما با موفقیت ویرایش شد');

    }


    public function amazingDiscountDestroy(AmazingDiscount $amazingDiscount)
    {
        $result = $amazingDiscount->delete();
        return redirect()->route('admin.market.discount.amazingDiscount')->with('swal-success', 'تخفیف با موفقیت حذف شد');
   
    }


    public function amazingDiscountStatus(AmazingDiscount $amazingDiscount)
    {
        
        $amazingDiscount->status = $amazingDiscount->status == 0 ? 1 : 0;
        $result = $amazingDiscount->save();
        if($result){
                if($amazingDiscount->status == 0){
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
