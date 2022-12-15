@extends('admin.layouts.master')

@section('head-tag')
<title>گالری کالا</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">کالاها</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">گالری کالا</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد گالری کالا</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ایجاد گالری کالا
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.market.gallery.index' , $product->id) }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.market.gallery.store', $product->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <section class="row">

                        
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="image">تصویر </label>
                                <input id="image" type="file" name="image" class="form-control form-control-sm">
                            </div>
                            @error('image')
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
