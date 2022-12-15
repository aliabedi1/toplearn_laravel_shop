@extends('admin.layouts.master')

@section('head-tag')
<title>رنگ کالا</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">کالاها</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">رنگ کالا</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد رنگ کالا</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ایجاد رنگ کالا
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.market.color.index' , $product->id) }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.market.color.store', $product->id) }}" method="post">
                    @csrf
                    <section class="row">

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="color_name">نام رنگ</label>
                                <input id="color_name" name="color_name" type="text" class="form-control form-control-sm" value="{{ old('color_name') }}">
                            </div>
                            @error('color_name')
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
