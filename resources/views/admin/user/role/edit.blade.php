@extends('admin.layouts.master')

@section('head-tag')
<title>ویرایش نقش</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">نقش ها</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش نقش</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ویرایش نقش
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.user.role.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.user.role.update' , $role->id) }}" method="post">
                    @csrf
                    @method('put')
                    <section class="row">

                        <section class="col-12 col-md-5 my-2">
                            <div class="form-group">
                                <label for="name">عنوان نقش</label>
                                <input name="name" id="name" type="text" class="form-control form-control-sm" value="{{ old('name',$role->name) }}">
                            </div>
                            
                            @error('name')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>
                        
                        <section class="col-12 col-md-5 my-2">
                            <div class="form-group">
                                <label for="description">توضیح نقش</label>
                                <input name="description" id="description" type="text" class="form-control form-control-sm" value="{{ old('description',$role->description)}}" >
                            </div>
                            
                            @error('description')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-2 my-2">
                            <button class="btn btn-primary btn-sm mt-md-4">ثبت</button>
                        </section>

                
                    </section>
                </form>
            </section>

        </section>
    </section>
</section>

@endsection
