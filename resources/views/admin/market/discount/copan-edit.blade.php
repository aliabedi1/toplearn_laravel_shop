@extends('admin.layouts.master')

@section('head-tag')
<title>ویرایش کوپن تخفیف</title>
<link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">برند</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش کوپن تخفیف</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ویرایش کوپن تخفیف
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.market.discount.copan') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.market.discount.copan.update' , $copan->id) }}" method="post">
                    @method('put')
                    @csrf

                    <section class="row">

                        <section class="col-12 my-2">
                            <div class="form-group">
                                <label for="code">کد کوپن</label>
                                <input name="code" id="code" type="text" class="form-control form-control-sm" value="{{ old('code', $copan->code) }}">
                            </div>
                            
                            @error('code')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>


                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="type">نوع کوپن</label>
                                <select name="type" id="type" class="form-control form-control-sm">
                                    <option value="0" @if(old('type', $copan->type) == 0) selected @endif>عمومی</option>
                                    <option value="1" @if(old('type', $copan->type) == 1) selected @endif>خصوصی</option>
                                </select>
                            </div>
                            
                            @error('type')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>


                        
                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="user_id">نام کاربر</label>
                                <select name="user_id" id="user_id" class="form-control form-control-sm" value="{{ old('user_id', $copan->user_id) }}" disabled>

                                    @foreach ($users as $user)
                                    
                                    <option value="{{ $user->id }}" @if (old('user_id') == $user->id) selected @endif> {{ $user->fullname }}</option>

                                    @endforeach
                                        
                                </select>
                            </div>
                            @error('user_id')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>


                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="amount">درصد/مقدار</label>
                                <input name="amount" id="amount" type="text" class="form-control form-control-sm" value="{{ old('amount', $copan->amount) }}">
                            </div>
                            @error('amount')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                            @enderror
                        </section>



                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="amount_type">نوع درصد/مقدار</label>
                                <select name="amount_type" id="amount_type" class="form-control form-control-sm">
                                    <option value="0" @if(old('amount_type', $copan->amount_type) == 0) selected @endif>درصد</option>
                                    <option value="1" @if(old('amount_type', $copan->amount_type) == 1) selected @endif>تومان</option>
                                </select>
                            </div>
                            
                            @error('amount_type')
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
                                <input name="discount_ceiling" id="discount_ceiling" type="text" class="form-control form-control-sm" value="{{ old('discount_ceiling', $copan->discount_ceiling) }}">
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
                                <label for="status">وضعیت</label>
                                <select name="status" id="status" class="form-control form-control-sm" id="status">
                                    <option value="0" @if(old('status', $copan->status) == 0) selected @endif>غیرفعال</option>
                                    <option value="1" @if(old('status', $copan->status) == 1) selected @endif>فعال</option>
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
                                <label for="start_date_view">تاریخ شروع</label>
                                <input type="text" name="start_date" id="start_date" class="form-control form-control-sm d-none" value="{{ old('start_date', $copan->start_date) }}">
                                <input type="text" id="start_date_view" class="form-control form-control-sm" value="{{ old('start_date', $copan->start_date) }}">
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
                                <label for="end_date_view">تاریخ پایان</label>
                                <input type="text" name="end_date" id="end_date" class="form-control form-control-sm d-none" value="{{ old('end_date', $copan->end_date) }}">
                                <input type="text" id="end_date_view" class="form-control form-control-sm" value="{{ old('end_date', $copan->end_date) }}">
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

<script>



    if ($('#type').find(':selected').val() == '1')
    {
        $('#user_id').removeAttr('disabled');
    }
    else if ($('#type').find(':selected').val() == '0') 
    {
        $('#user_id').attr('disabled','disabled');
    }

    $("#type").change(function(){
        
        if ($('#type').find(':selected').val() == '1')
        {
            $('#user_id').removeAttr('disabled');
        }
        else if ($('#type').find(':selected').val() == '0') 
        {
            $('#user_id').attr('disabled','disabled');
        }

    });



</script>

   
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
