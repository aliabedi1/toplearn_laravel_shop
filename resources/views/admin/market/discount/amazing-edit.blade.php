@extends('admin.layouts.master')

@section('head-tag')
<title>ویرایش به فروش شگفت انگیز</title>
<link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">

@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">تخفیف ها</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش به فروش شگفت انگیز</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    ویرایش به فروش شگفت انگیز
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.market.discount.amazingDiscount') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.market.discount.amazingDiscount.update',$amazingDiscount->id) }}" method="post">
                    @method('put    ')
                    @csrf

                    <section class="row">

                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label for="product_id">نام کالا</label>
                                <select name="product_id" id="product_id" class="form-control form-control-sm" >

                                    @foreach ($products as $product)
                                    
                                    <option value="{{ $product->id }}" @if (old('product_id',$amazingDiscount->product_id) == $product->id) selected @endif> {{ $product->name }}</option>

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
                                <label for="percent">درصد تخفیف</label>
                                <input name="percent" id="percent" type="text" class="form-control form-control-sm" value="{{ old('percent',$amazingDiscount->percent) }}">
                            </div>
                            
                            @error('percent')
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
                                    <option value="0" @if(old('status',$amazingDiscount->status) == 0) selected @endif>غیرفعال</option>
                                    <option value="1" @if(old('status',$amazingDiscount->status) == 1) selected @endif>فعال</option>
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
                                <label for="">تاریخ شروع</label>
                                <input type="text" name="start_date" id="start_date" class="form-control form-control-sm d-none" value="{{ old('start_date',$amazingDiscount->start_date) }}">
                                <input type="text" id="start_date_view" class="form-control form-control-sm" value="{{ old('start_date',$amazingDiscount->start_date) }}">
                            </div>
                            @error('start_date')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="">تاریخ پایان</label>
                                <input type="text" name="end_date" id="end_date" class="form-control form-control-sm d-none" value="{{ old('end_date',$amazingDiscount->end_date) }}">
                                <input type="text" id="end_date_view" class="form-control form-control-sm" value="{{ old('end_date',$amazingDiscount->end_date) }}">
                            </div>
                            @error('end_date')
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



@section('script')
    
<script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
<script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>

<script>
    $(document).ready(function () {
        $('#start_date_view').persianDatepicker({
            format: 'YYYY/MM/DD',
            altField: '#start_date',
            timePicker: {
                enabled: true,
                meridiem: {
                    enabled: true
                }
            }
        })
    });

    $(document).ready(function () {
        $('#end_date_view').persianDatepicker({
            format: 'YYYY/MM/DD',
            altField: '#end_date',
            timePicker: {
                enabled: true,
                meridiem: {
                    enabled: true
                }
            }
        })
    });
</script>


@endsection