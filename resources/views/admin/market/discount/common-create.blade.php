@extends('admin.layouts.master')

@section('head-tag')
<title>ایجاد تخفیف عمومی</title>
<link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">

@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">برند</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد تخفیف عمومی</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ایجاد تخفیف عمومی
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.market.discount.commonDiscount') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.market.discount.commonDiscount.store') }}" method="post">
                    @csrf

                    <section class="row">

                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label for="title">عنوان مناسبت</label>
                                <input name="title" id="title" type="text" class="form-control form-control-sm" value="{{ old('title') }}" >
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
                                <label for="percentage">درصد تخفیف</label>
                                <input name="percentage" id="percentage" type="text" class="form-control form-control-sm" value="{{ old('percentage') }}" >
                            </div>
                            @error('percentage')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>


                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="discount_ceiling">حداکثر تخفیف</label>
                                <input name="discount_ceiling" id="discount_ceiling" type="text" class="form-control form-control-sm" value="{{ old('discount_ceiling') }}">
                            </div>
                            @error('discount_ceiling')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="minimal_order_amount">حداقل تعداد سفارش برای اعمال</label>
                                <input name="minimal_order_amount" id="minimal_order_amount" type="text" class="form-control form-control-sm" value="{{ old('minimal_order_amount') }}">
                            </div>
                            @error('minimal_order_amount')
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
                                <label for="">تاریخ شروع</label>
                                <input type="text" name="start_date" id="start_date" class="form-control form-control-sm d-none" value="{{ old('start_date') }}">
                                <input type="text" id="start_date_view" class="form-control form-control-sm" value="{{ old('start_date') }}">
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
                                <input type="text" name="end_date" id="end_date" class="form-control form-control-sm d-none" value="{{ old('end_date') }}">
                                <input type="text" id="end_date_view" class="form-control form-control-sm" value="{{ old('end_date') }}">
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