@extends('admin.layouts.master')

@section('head-tag')
<title>ویژگی کالا</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">فرم کالا</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">ویژگی فرم</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد ویژگی کالا</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ایجاد ویژگی کالا
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.market.value.index' , $categoryAttribute->id) }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.market.value.store', $categoryAttribute->id) }}" method="post">
                    @csrf
                    <section class="row">


                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="product_id">نام کالا</label>
                                <select name="product_id" id="product_id" class="form-control form-control-sm" >

                                    @foreach ($products as $product)
                                    
                                    <option value="{{ $product->id }}" @if (old('product_id') == $product->id) selected @endif> {{ $product->name }}</option>

                                    @endforeach
                                        
                                </select>
                            </div>
                            @error('product_id')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>


                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="value">مقدار ویژگی</label>
                                <input id="value" name="value" type="text" class="form-control form-control-sm" value="{{ old('color_name') }}">
                            </div>
                            @error('value')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section> 
                        
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="price_increase">افزایش قیمت</label>
                                <input id="price_increase" name="price_increase" type="text" class="form-control form-control-sm" value="{{ old('price_increase') }}">
                            </div>
                            @error('price_increase')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>

                        
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="type">نوع نمایش</label>
                                <select name="type" id="" class="form-control form-control-sm" id="type">
                                    <option value="0" @if(old('type') == 0) selected @endif>ثابت</option>
                                    <option value="1" @if(old('type') == 1) selected @endif>چند مقداری انتخابی</option>
                                </select>
                            </div>
                            @error('type')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>

                       
                        <section class="col-12 my-2">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </section>
                </form>
            </section>

        </section>
    </section>
</section>

@endsection
