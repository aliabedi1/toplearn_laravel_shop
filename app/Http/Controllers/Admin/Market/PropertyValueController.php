<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Market\CategoryValueRequest;
use App\Models\Market\CategoryAttribute;
use App\Models\Market\CategoryValue;
use Illuminate\Http\Request;

class PropertyValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryAttribute $categoryAttribute)
    {
        return view('admin.market.property.value.index',compact('categoryAttribute'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(CategoryAttribute $categoryAttribute)
    {
        $products = $categoryAttribute->category->products;
        return view('admin.market.property.value.create',compact('categoryAttribute','products'));
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryValueRequest $request, CategoryAttribute $categoryAttribute)
    {
        $inputs['type'] = $request->input('type');
        $inputs['product_id'] = $request->input('product_id');
        $inputs['value'] = json_encode(['value' => $request->value , 'price_increase' => number_format($request->price_increase, 3, '.', '')]); 
        $inputs['category_attribute_id'] = $categoryAttribute->id; 
        $result = CategoryValue::create($inputs);
        return redirect()->route('admin.market.value.index',$categoryAttribute->id)->with('swal-success', 'ویزگی جدید شما با موفقیت ایجاد شد');
   
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
    public function edit(CategoryAttribute $categoryAttribute , CategoryValue $categoryValue)
    {
        $products = $categoryAttribute->category->products;
        return view('admin.market.property.value.edit',compact('categoryValue','categoryAttribute','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryValueRequest $request, CategoryAttribute $categoryAttribute, CategoryValue $categoryValue )
    {
        $inputs['type'] = $request->input('type');
        $inputs['product_id'] = $request->input('product_id');
        $inputs['value'] = json_encode(['value' => $request->value , 'price_increase' => number_format($request->price_increase, 3, '.', '')]); 
        $inputs['category_attribute_id'] = $categoryAttribute->id; 
        $categoryValue->update($inputs);
        return redirect()->route('admin.market.value.index',$categoryAttribute->id)->with('swal-success', 'ویزگی شما با موفقیت ویرایش شد');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryAttribute $categoryAttribute, CategoryValue $categoryValue)
    {
        $result = $categoryValue->delete();
        return redirect()->route('admin.market.value.index' , $categoryAttribute->id)->with('swal-success', 'ویژگی با موفقیت حذف شد');
 
    }
}
