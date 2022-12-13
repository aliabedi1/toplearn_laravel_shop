@extends('admin.layouts.master')

@section('head-tag')
<title>ایجاد کالا</title>
<link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">

@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">کالا </a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد کالا</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ایجاد کالا
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.market.product.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.market.product.store') }}" method="post" enctype="multipart/form-data" id="form">
                    @csrf
                    <section class="row">

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="name">نام کالا</label>
                                <input name="name" id="name" type="text" class="form-control form-control-sm">
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
                                <label for="category_id">دسته کالا</label>
                                <select name="category_id" id="category_id" class="form-control form-control-sm">\

                                    @foreach ($productCategories as $productCategory)
                                    
                                        <option value="{{ $productCategory->id }}">{{ $productCategory->name }}</option>

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


                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="brand_id">برند کالا</label>
                                <select name="brand_id" id="brand_id" class="form-control form-control-sm">\

                                    @foreach ($brands as $brand)
                                    
                                        <option value="{{ $brand->id }}">{{ $brand->original_name }}</option>

                                    @endforeach
                                        
                                </select>
                            </div>
                            @error('brand_id')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>



                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="weight">وزن</label>
                                <input name="weight" id="weight" type="text" class="form-control form-control-sm">
                            </div>
                            @error('weight')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>
                        
                        
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="weight_unit">واحد وزن</label>
                                <input name="weight_unit" id="weight_unit" type="text" class="form-control form-control-sm">
                            </div>
                            @error('weight_unit')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>


                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="length">طول (سانتیمتر)</label>
                                <input name="length" id="length" type="text" class="form-control form-control-sm">
                            </div>
                            @error('length')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>

                        
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="width">عرض (سانتیمتر)</label>
                                <input name="width" id="width" type="text" class="form-control form-control-sm">
                            </div>
                            @error('width')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>

                        
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="height">ارتفاع (سانتیمتر)</label>
                                <input name="height" id="height" type="text" class="form-control form-control-sm">
                            </div>
                            @error('height')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>


                        
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="tags">تگ ها</label>
                                <input type="hidden" class="form-control form-control-sm"  name="tags" id="tags" value="{{ old('tags') }}">
                                <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                                </select>
                            </div>
                            @error('tags')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="price">قیمت کالا</label>
                                <input name="price" id="price" type="text" class="form-control form-control-sm">
                            </div>
                            @error('price')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="status">وضعیت نمایش</label>
                                <select name="status" id="" class="form-control form-control-sm" id="status">
                                    <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                                    <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
                                </select>
                            </div>
                            @error('status')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="marketable">وضعیت فروش</label>
                                <select name="marketable" id="" class="form-control form-control-sm" id="marketable">
                                    <option value="0" @if(old('marketable') == 0) selected @endif>غیرفعال</option>
                                    <option value="1" @if(old('marketable') == 1) selected @endif>فعال</option>
                                </select>
                            </div>
                            @error('marketable')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>


                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="">تاریخ انتشار</label>
                                <input type="text" name="published_at" id="published_at" class="form-control form-control-sm d-none">
                                <input type="text" id="published_at_view" class="form-control form-control-sm">
                            </div>
                            @error('published_at')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>


                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label for="introduction">توضیحات</label>
                                <textarea name="introduction" id="introduction"  class="form-control form-control-sm" rows="6"></textarea>
                            </div>
                            @error('introduction')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                        @enderror
                        </section>



                        <section class="col-12 border-top border-bottom py-3 mb-3">

                            <section class="row">

                                <section class="col-6 col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" placeholder="ویژگی ...">
                                    </div>
                                </section>

                                <section class="col-6 col-md-3">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-sm" placeholder="مقدار ...">
                                    </div>
                                </section>

                            </section>

                            <section>
                                <button type="button" class="btn btn-success btn-sm">افزودن</button>
                            </section>


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


@section('script')

    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        CKEDITOR.replace('introduction');
    </script>

    <script>
            $(document).ready(function () {
                $('#published_at_view').persianDatepicker({
                    format: 'YYYY/MM/DD',
                    altField: '#published_at',
                    timePicker: {
                        enabled: true,
                        meridiem: {
                            enabled: true
                    }
            }
                    
                })
            });
    </script>

<script>
    $(document).ready(function () {
        var tags_input = $('#tags');
        var select_tags = $('#select_tags');
        var default_tags = tags_input.val();
        var default_data = null;

        if(tags_input.val() !== null && tags_input.val().length > 0)
        {
            default_data = default_tags.split(',');
        }

        select_tags.select2({
            placeholder : 'لطفا تگ های خود را وارد نمایید',
            tags: true,
            data: default_data
        });
        select_tags.children('option').attr('selected', true).trigger('change');


        $('#form').submit(function ( event ){
            if(select_tags.val() !== null && select_tags.val().length > 0){
                var selectedSource = select_tags.val().join(',');
                tags_input.val(selectedSource)
            }
        })
    })
</script>

@endsection