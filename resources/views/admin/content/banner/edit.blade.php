@extends('admin.layouts.master')

@section('head-tag')
<title>ویرایش بنر</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش محتوی</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بنر ها</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش بنر</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    ویرایش بنر
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.content.banner.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.content.banner.update' , $banner->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')

                    <section class="row">

                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label for="">عنوان بنر</label>
                                <input name="title" type="text" class="form-control form-control-sm" value="{{ old('title',$banner->title) }}">
                            </div>
                            @error('title')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        
                        </section>


                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="image">تصویر</label>
                                <input type="file" class="form-control form-control-sm" name="image" id="image">
                            </div>
                            @error('image')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror

                            
                            <section class="row">
                                @php
                                    $number = 1;
                                    @endphp
                                @foreach ($banner->image['indexArray'] as $key => $value )
                                <section class="col-md-{{ 6 / $number }}">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" name="currentImage" value="{{ $key }}" id="{{ $number }}" @if($banner->image['currentImage'] == $key) checked @endif>
                                        <label for="{{ $number }}" class="form-check-label mx-2">
                                            <img src="{{ asset($value) }}" class="w-100" alt="">
                                        </label>
                                    </div>
                                </section>
                                @php
                                    $number++;
                                @endphp
                                @endforeach

                            
                            </section>
                        </section>



                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="">آدرس URL</label>
                                <input type="text" name="url" class="form-control form-control-sm" value="{{ old('url',$banner->url) }}">
                            </div>
                            @error('url')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="status">وضعیت</label>
                                <select name="status" id="" class="form-control form-control-sm" id="status">
                                    <option value="0" @if(old('status',$banner->status) == 0) selected @endif>غیرفعال</option>
                                    <option value="1" @if(old('status',$banner->status) == 1) selected @endif>فعال</option>
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
                                <label for="position">موقعیت</label>
                                <input id="position" name="position" type="text" class="form-control form-control-sm" value="{{ old('position',$banner->position) }}">
                            </div>
                            @error('position')
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
