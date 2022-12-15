@extends('admin.layouts.master')

@section('head-tag')
<title>گالری</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">کالاها</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> گالری</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    گالری
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.market.gallery.create' , $product->id) }}" class="btn btn-info btn-sm">ایجاد گالری جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام کالا</th>
                            <th>تصویر</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                    
                        @foreach ($product->galleries as $gallery)
                            
                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $product->name }}</td>
                            <td>
                                <img src="{{ asset($gallery->image['indexArray'][$gallery->image['currentImage']] ) }}" alt="" width="100" height="50">
                            </td>
                            <td class="width-22-rem text-left">

                                <form class="d-inline" action="{{ route('admin.market.gallery.destroy' , [$product->id , $gallery->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger btm-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>

                                </form>
                            </td>
                        </tr>

                        @endforeach
                        
                    </tbody>
                </table>
            </section>

        </section>
    </section>
</section>

@endsection

@section('script')

@include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
    
@endsection