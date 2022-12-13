@extends('admin.layouts.master')

@section('head-tag')
<title>ویرایش مشتری</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">مشتریان</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش مشتری</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ویرایش مشتری
                </h5>
            </section>
            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.user.customer.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.user.customer.update' , $user->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <section class="row">

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="first_name">نام</label>
                                <input name="first_name" type="text" class="form-control form-control-sm" id="first_name" value="{{ old('first_name', $user->first_name) }}">
                            </div>
                            @error('first_name')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="last_name">نام خانوادگی</label>
                                <input name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}" type="text" class="form-control form-control-sm">
                            </div>
                            @error('last_name')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        
                        </section>



                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="profile_photo_path">تصویر</label>
                                <input name="profile_photo_path" id="profile_photo_path" type="file" class="form-control form-control-sm">
                                @if ($user->profile_photo_path)
                                <img src="{{ asset($user->profile_photo_path) }}" alt="" width="100" height="50" class="mt-3">
                                    
                                @endif
                            </div>
                            @error('profile_photo_path')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="activation">وضعیت فعالسازی</label>
                                <select name="activation" id="" class="form-control form-control-sm" id="activation">
                                    <option value="0" @if(old('activation',$user->activation) == 0) selected @endif>غیرفعال</option>
                                    <option value="1" @if(old('activation',$user->activation) == 1) selected @endif>فعال</option>
                                </select>
                            </div>
                            @error('activation')
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
