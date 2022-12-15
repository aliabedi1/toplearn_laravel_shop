@extends('admin.layouts.master')

@section('head-tag')
<title>فرم کالا</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">فرم کالا</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش فرم کالا</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ویرایش فرم کالا
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.market.property.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.market.property.update' , $property->id) }}" method="post">
                    @csrf
                    @method('put')
                    <section class="row">

                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label for="name">نام فرم</label>
                                <input id="name" name="name" type="text" class="form-control form-control-sm" value="{{ old('name',$property->name) }}">
                            </div>
                            
                            @error('name')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="unit">واحد اندازی گیری فرم</label>
                                <input id="unit" name="unit" type="text" class="form-control form-control-sm" value="{{ old('unit',$property->unit) }}">
                            </div>
                            
                            @error('unit')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="category_id">دسته بندی والد</label>
                                <select name="category_id" id="category_id" class="form-control form-control-sm">

                                    @foreach ($categories as $category )
                                        <option value="{{ $category->id }}" @if(old('category_id',$property->category_id) == $category->id) selected @endif>{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            
                            @error('category_id')
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
