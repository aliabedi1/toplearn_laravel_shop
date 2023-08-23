@extends('customer.layouts.master-two-col')


@section('head-tag')
    <title>
        تکمیل پروفایل کاربری
    </title>
@endsection


@section('content')




    <!-- start main one col -->
    <main id="main-body-one-col" class="main-body">

        <!-- start cart -->
        <section class="mb-4">
            <section class="container-xxl" >
                <section class="row">
                    <section class="col">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>تکمیل اطلاعات ارسال کالا (آدرس گیرنده، مشخصات گیرنده، نحوه ارسال) </span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>

                        <section class="row mt-4">
                            <section class="col-md-9">
                                <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                    <!-- start vontent header -->
                                    <section class="content-header mb-3">
                                        <section class="d-flex justify-content-between align-items-center">
                                            <h2 class="content-header-title content-header-title-small">
                                                انتخاب آدرس و مشخصات گیرنده
                                            </h2>
                                            <section class="content-header-link">
                                                <!--<a href="#">مشاهده همه</a>-->
                                            </section>
                                        </section>
                                    </section>

                                    <section class="address-alert alert alert-primary d-flex align-items-center p-2" role="alert">
                                        <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                        <secrion>
                                            پس از ایجاد آدرس، آدرس را انتخاب کنید.
                                        </secrion>
                                    </section>


                                    <section class="address-select">

                                        @foreach ($addresses as $address)
                                            
                                            <input type="radio" name="address" value="{{ $address->id }}" id="a{{ $address->id }}"/> <!--checked="checked"-->
                                            <label for="a{{ $address->id }}" class="address-wrapper mb-2 p-2">
                                                <section class="mb-2">
                                                    <i class="fa fa-map-marker-alt mx-1"></i>
                                                    آدرس : {{ 'استان '. $address->city->province->name }}، شهر {{ $address->city->name }}، {{ $address->address }}
                                                </section>
                                                <section class="mb-2">
                                                    <i class="fa fa-user-tag mx-1"></i>
                                                    گیرنده : {{ $address->full_name }}
                                                </section>
                                                <section class="mb-2">
                                                    <i class="fa fa-mobile-alt mx-1"></i>
                                                    موبایل گیرنده : {{ $address->mobile }}
                                                </section>
                                                <a class="" href="#" data-bs-toggle="modal" data-bs-target="#add-address-{{ $address->id }}"><i class="fa fa-edit"></i> ویرایش آدرس</a>
                                                <span class="address-selected">کالاها به این آدرس ارسال می شوند</span>
                                            </label>



                                            <section class="address-add-wrapper">
                                                <!-- start add address Modal -->
                                                <section class="modal fade" id="add-address-{{ $address->id }}" tabindex="-1" aria-labelledby="add-address-label" aria-hidden="true">
                                                    <section class="modal-dialog">
                                                        <section class="modal-content">
                                                            <section class="modal-header">
                                                                <h5 class="modal-title" id="add-address-label"><i class="fa fa-plus"></i> ایجاد آدرس جدید</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </section>
                                                            <section class="modal-body">
                                                                <form class="row" action="">
                                                                    <section class="col-6 mb-2">
                                                                        <label for="province" class="form-label mb-1">استان</label>
                                                                        <select class="form-select form-select-sm" id="province">
                                                                            <option selected>استان را انتخاب کنید</option>
                                                                            @foreach ($provinces as $province)
                                                                            <option value="{{ $province->id }}" @if ($address->city->province->id == $province->id)
                                                                                {{ 'selected' }}
                                                                            @endif >{{ $province->name }}</option>
                                                                            @endforeach

                                                                            
                                                                        </select>
                                                                    </section>
    
                                                                    <section class="col-6 mb-2">
                                                                        <label for="city" class="form-label mb-1">شهر</label>
                                                                        <select class="form-select form-select-sm" id="city">
                                                                            <option selected>استان را انتخاب کنید</option>
                                                                            <option value="1">تبریز</option>
                                                                            <option value="2">میانه</option>
                                                                            <option value="3">آذرشهر</option>
                                                                        </select>
                                                                    </section>
                                                                    <section class="col-12 mb-2">
                                                                        <label for="address" class="form-label mb-1">نشانی</label>
                                                                        <input type="text" class="form-control form-control-sm" id="address" placeholder="نشانی">
                                                                    </section>
    
                                                                    <section class="col-6 mb-2">
                                                                        <label for="postal_code" class="form-label mb-1">کد پستی</label>
                                                                        <input type="text" class="form-control form-control-sm" id="postal_code" placeholder="کد پستی">
                                                                    </section>
    
                                                                    <section class="col-3 mb-2">
                                                                        <label for="no" class="form-label mb-1">پلاک</label>
                                                                        <input type="text" class="form-control form-control-sm" id="no" placeholder="پلاک">
                                                                    </section>
    
                                                                    <section class="col-3 mb-2">
                                                                        <label for="unit" class="form-label mb-1">واحد</label>
                                                                        <input type="text" class="form-control form-control-sm" id="unit" placeholder="واحد">
                                                                    </section>
                                                                    
                                                                    <section class="border-bottom mt-2 mb-3"></section>
    
                                                                    <section class="col-12 mb-2">
                                                                        <section class="form-check">
                                                                            <input class="form-check-input" type="checkbox" value="" id="receiver">
                                                                            <label class="form-check-label" for="receiver">
                                                                                گیرنده سفارش خودم هستم
                                                                            </label>
                                                                        </section>
                                                                    </section>
    
                                                                    <section class="col-6 mb-2">
                                                                        <label for="first_name" class="form-label mb-1">نام گیرنده</label>
                                                                        <input type="text" class="form-control form-control-sm" id="first_name" placeholder="نام گیرنده">
                                                                    </section>
    
                                                                    <section class="col-6 mb-2">
                                                                        <label for="last_name" class="form-label mb-1">نام خانوادگی گیرنده</label>
                                                                        <input type="text" class="form-control form-control-sm" id="last_name" placeholder="نام خانوادگی گیرنده">
                                                                    </section>
    
                                                                    <section class="col-6 mb-2">
                                                                        <label for="mobile" class="form-label mb-1">شماره موبایل</label>
                                                                        <input type="text" class="form-control form-control-sm" id="mobile" placeholder="شماره موبایل">
                                                                    </section>
    
    
                                                                </form>
                                                            </section>
                                                            <section class="modal-footer py-1">
                                                                <button type="button" class="btn btn-sm btn-primary">ثبت آدرس</button>
                                                                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
                                                            </section>
                                                        </section>
                                                    </section>
                                                </section>
                                                <!-- end add address Modal -->
                                            </section>

                                        @endforeach


                                        <section class="address-add-wrapper">
                                            <button class="address-add-button" type="button" data-bs-toggle="modal" data-bs-target="#add-address" ><i class="fa fa-plus"></i> ایجاد آدرس جدید</button>
                                            <!-- start add address Modal -->
                                            <section class="modal fade" id="add-address" tabindex="-1" aria-labelledby="add-address-label" aria-hidden="true">
                                                <section class="modal-dialog">
                                                    <section class="modal-content">
                                                        <section class="modal-header">
                                                            <h5 class="modal-title" id="add-address-label"><i class="fa fa-plus"></i> ایجاد آدرس جدید</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </section>
                                                        <section class="modal-body">
                                                            <form class="row" action="">
                                                                <section class="col-6 mb-2">
                                                                    <label for="province" class="form-label mb-1">استان</label>
                                                                    <select class="form-select form-select-sm" id="province">
                                                                        <option selected>استان را انتخاب کنید</option>
                                                                        <option value="1">آذربایجان شرقی</option>
                                                                        <option value="2">آذربایجان غربی</option>
                                                                        <option value="3">تهران</option>
                                                                    </select>
                                                                </section>

                                                                <section class="col-6 mb-2">
                                                                    <label for="city" class="form-label mb-1">شهر</label>
                                                                    <select class="form-select form-select-sm" id="city">
                                                                        <option selected>استان را انتخاب کنید</option>
                                                                        <option value="1">تبریز</option>
                                                                        <option value="2">میانه</option>
                                                                        <option value="3">آذرشهر</option>
                                                                    </select>
                                                                </section>
                                                                <section class="col-12 mb-2">
                                                                    <label for="address" class="form-label mb-1">نشانی</label>
                                                                    <input type="text" class="form-control form-control-sm" id="address" placeholder="نشانی">
                                                                </section>

                                                                <section class="col-6 mb-2">
                                                                    <label for="postal_code" class="form-label mb-1">کد پستی</label>
                                                                    <input type="text" class="form-control form-control-sm" id="postal_code" placeholder="کد پستی">
                                                                </section>

                                                                <section class="col-3 mb-2">
                                                                    <label for="no" class="form-label mb-1">پلاک</label>
                                                                    <input type="text" class="form-control form-control-sm" id="no" placeholder="پلاک">
                                                                </section>

                                                                <section class="col-3 mb-2">
                                                                    <label for="unit" class="form-label mb-1">واحد</label>
                                                                    <input type="text" class="form-control form-control-sm" id="unit" placeholder="واحد">
                                                                </section>
                                                                
                                                                <section class="border-bottom mt-2 mb-3"></section>

                                                                <section class="col-12 mb-2">
                                                                    <section class="form-check">
                                                                        <input class="form-check-input" type="checkbox" value="" id="receiver">
                                                                        <label class="form-check-label" for="receiver">
                                                                            گیرنده سفارش خودم هستم
                                                                        </label>
                                                                    </section>
                                                                </section>

                                                                <section class="col-6 mb-2">
                                                                    <label for="first_name" class="form-label mb-1">نام گیرنده</label>
                                                                    <input type="text" class="form-control form-control-sm" id="first_name" placeholder="نام گیرنده">
                                                                </section>

                                                                <section class="col-6 mb-2">
                                                                    <label for="last_name" class="form-label mb-1">نام خانوادگی گیرنده</label>
                                                                    <input type="text" class="form-control form-control-sm" id="last_name" placeholder="نام خانوادگی گیرنده">
                                                                </section>

                                                                <section class="col-6 mb-2">
                                                                    <label for="mobile" class="form-label mb-1">شماره موبایل</label>
                                                                    <input type="text" class="form-control form-control-sm" id="mobile" placeholder="شماره موبایل">
                                                                </section>


                                                            </form>
                                                        </section>
                                                        <section class="modal-footer py-1">
                                                            <button type="button" class="btn btn-sm btn-primary">ثبت آدرس</button>
                                                            <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
                                                        </section>
                                                    </section>
                                                </section>
                                            </section>
                                            <!-- end add address Modal -->
                                        </section>



                                    </section>
                                </section>


                                <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                    <!-- start vontent header -->
                                    <section class="content-header mb-3">
                                        <section class="d-flex justify-content-between align-items-center">
                                            <h2 class="content-header-title content-header-title-small">
                                                انتخاب نحوه ارسال
                                            </h2>
                                            <section class="content-header-link">
                                                <!--<a href="#">مشاهده همه</a>-->
                                            </section>
                                        </section>
                                    </section>
                                    <section class="delivery-select ">

                                        <section class="address-alert alert alert-primary d-flex align-items-center p-2" role="alert">
                                            <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                            <secrion>
                                                نحوه ارسال کالا را انتخاب کنید. هنگام انتخاب لطفا مدت زمان ارسال را در نظر بگیرید.
                                            </secrion>
                                        </section>

                                        <input type="radio" name="delivery_type" value="1" id="d1"/>
                                        <label for="d1" class="col-12 col-md-4 delivery-wrapper mb-2 pt-2">
                                            <section class="mb-2">
                                                <i class="fa fa-shipping-fast mx-1"></i>
                                                پست پیشتاز
                                            </section>
                                            <section class="mb-2">
                                                <i class="fa fa-calendar-alt mx-1"></i>
                                                تامین کالا از 4 روز کاری آینده
                                            </section>
                                        </label>

                                        <input type="radio" name="delivery_type" value="2" id="d2"/>
                                        <label for="d2" class="col-12 col-md-4 delivery-wrapper mb-2 pt-2">
                                            <section class="mb-2">
                                                <i class="fa fa-shipping-fast mx-1"></i>
                                                تیپاکس
                                            </section>
                                            <section class="mb-2">
                                                <i class="fa fa-calendar-alt mx-1"></i>
                                                تامین کالا از 2 روز کاری آینده
                                            </section>
                                        </label>


                                    </section>
                                </section>




                            </section>
                            

                            <section class="col-md-3">
                                <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                    @php
                                        $totalProductPrice = 0;
                                        $totalDiscount = 0;
                                    @endphp
    
                                    @foreach($cartItems as $cartItem)
                                        @php
                                            $totalProductPrice += $cartItem->cartItemProductPrice() * $cartItem->number;
                                            $totalDiscount += $cartItem->cartItemProductDiscount() * $cartItem->number;
                                        @endphp
                                    @endforeach
    
                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">قیمت کالاها ({{ $cartItems->count() }})</p>
                                        <p class="text-muted"><span  id="total_product_price">{{ priceFormat($totalProductPrice) }}</span> تومان</p>
                                    </section>
    
                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">تخفیف کالاها</p>
                                        <p class="text-danger fw-bolder"><span id="total_discount">{{ priceFormat($totalDiscount) }}</span> تومان</p>
                                    </section>
                                    
                                    <section class="border-bottom mb-3"></section>
                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">جمع سبد خرید</p>
                                        <p class="fw-bolder"><span id="total_price">{{ priceFormat($totalProductPrice - $totalDiscount) }}</span> تومان</p>
                                    </section>
    
                                    <p class="my-3">
                                        <i class="fa fa-info-circle me-1"></i>کاربر گرامی  خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد.
                                    </p>
    
    
                                    <section class="">
                                        <button type="button" onclick="document.getElementById('profile_completion').submit();" class="btn btn-danger d-block w-100">تکمیل فرآیند خرید</button>
                                    </section>
    
                                </section>
                            </section>
                        </section>
                    </section>
                </section>

            </section>
        </section>
        <!-- end cart -->



    </main>
    <!-- end main one col -->

@endsection

@section('script')

<script>
    
    $('#gender').on('change', function() {
            changeMilitaryServiceDisplay(this.value)
        });

        function changeMilitaryServiceDisplay(genderStatus) {
            if(genderStatus == '0') {
                $('#military_service_section').removeClass('d-none')
                $('#military_service_section').addClass('d-block')
            } else {
                $('#military_service_section').removeClass('d-block')
                $('#military_service_section').addClass('d-none')
            }
        }

        changeMilitaryServiceDisplay($('#gender').val())

</script>
    
<script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
<script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>

<script>
        var tenYearsAgo = (Math.floor(Date.now()/1000) - 315360000 ) * 1000; 
        $(document).ready(function () {
            $('#birthdate_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                maxDate: tenYearsAgo,
                altField: '#birthdate'
            })
        });
</script>



<script>

    $('#province').on('click', function() {
        var url = $(this).attr('data-link');
        getCityList(this.value, url);
    });

    function getCityList(province, url) {
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                province_id: province,
                _token: "{{ csrf_token() }}",
            },
            success: function(response) {
                $('#city option').not(':first').remove();
                var select = $('#city');

                $.each(response, function(key, value) {
                    select.append($("<option></option>")
                    .attr("value", value.id)
                    .text(value.name));
                });

            },
            error: function(jqXHR, textStatus, errorThrown) {
                errorToast('ارتباط برقرار نشد');
            }
        });
    }

    function errorToast(message){
        var errorToastTag = '<section class="toast" data-delay="5000">\n' +
            '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                '<strong class="ml-auto">' + message + '</strong>\n' +
                '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                    $('.toast-wrapper').append(errorToastTag);
                    $('.toast').toast('show').delay(5500).queue(function() {
                        $(this).remove();
                    })
    }

</script>

@endsection