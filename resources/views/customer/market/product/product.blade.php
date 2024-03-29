@extends('customer.layouts.master-two-col')

@section('head-tag')
    
    <title>{{ $product->name }}</title>

@endsection

@section('content')
    

        <!-- start cart -->
        <section class="mb-4">
            <section class="container-xxl" >
                <section class="row">
                    <section class="col">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>{{ $product->name }} </span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>

                        <section class="row mt-4">
                            <!-- start image gallery -->
                            <section class="col-md-4">
                                <section class="content-wrapper bg-white p-3 rounded-2 mb-4">
                                    <section class="product-gallery">
                                        <section class="product-gallery-selected-image mb-3">
                                            <img src="{{ asset($product->image['indexArray']['medium']) }}" alt="{{ asset($product->image['indexArray']['medium']) . '-' . '1' }}">
                                        </section>
                                        <section class="product-gallery-thumbs">
                                            
                                            <img class="product-gallery-thumb" src="{{ asset($product->image['indexArray']['medium']) }}" alt="{{ asset($product->image['indexArray']['medium']) . '-' . '1' }}" data-input="{{ asset($product->image['indexArray']['medium']) }}">

                                            @foreach ($product->images as $key => $image)
                                                
                                                <img class="product-gallery-thumb" src="{{ asset($image->image['indexArray']['medium']) }}" alt="{{ asset($image->image['indexArray']['medium']) . '-' . ($key + 2) }}" data-input="{{ asset($image->image['indexArray']['medium']) }}">

                                            @endforeach
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <!-- end image gallery -->

                            <!-- start product info -->
                            <section class="col-md-5">

                                <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                    <!-- start vontent header -->
                                    <section class="content-header mb-3">
                                        <section class="d-flex justify-content-between align-items-center">
                                            <h2 class="content-header-title content-header-title-small">
                                                {{ $product->name }}
                                            </h2>
                                            <section class="content-header-link">
                                                <!--<a href="#">مشاهده همه</a>-->
                                            </section>
                                        </section>
                                    </section>


                                    <section class="product-info">
                                        <form class="product-info" id="add_to_cart" action="{{ route('customer.sales-process.add-to-cart' , $product) }}" method="POST">    
                                        @csrf

                                            @php
                                                $colors = $product->colors;
                                            @endphp


                                            @if ($colors->count() > 0)
                                                
                                                <p>
                                                    <span>
                                                        رنگ انتخاب شده : <span id="selected_color_name"></span>
                                                    </span>
                                                </p>

                                                <p>

                                                    @foreach ($colors as $key => $color)
                                                        
                                                        <label for="{{ 'color-'. $color->id }}" style="background-color: {{ $color->color ?? '#ffffff' }};" class="product-info-colors me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="{{ $color->color_name }}"></label>

                                                        <input type="radio" name="color" id="{{ 'color-'. $color->id }}" class="d-none" value="{{ $color->id }}" data-color-name="{{ $color->color_name }}" data-color-price="{{ $color->price_increase }}"  @if($key == 0) checked @endif >




                                                    @endforeach
                                                    
                                                </p>

                                            @endif


                                            @php
                                                $guarantees = $product->guarantees;
                                            @endphp

                                            @if ($guarantees->count() > 0)

                                                <p>
                                                    <i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                                    گارانتی : 

                                                    <select name="guarantee" id="guarantee" class="p-1">

                                                        @foreach ($guarantees as $key => $guarantee)

                                                            <option data-guarantee-price="{{ $guarantee->price_increase }}" value="{{ $guarantee->id }}" @if ($key == 0) selected @endif >

                                                                <span>{{ $guarantee->name }}</span>

                                                            </option>

                                                        @endforeach

                                                    </select>
                                                </p>

                                            @endif

                                            <p>
                                                @if ($product->marketable == 0)
                                                
                                                    <i class="fa fa-ban cart-product-selected-store me-1"></i> <span style="color: red">کالا ناموجود است</span>

                                                @elseif ($product->marketable_number > 0)

                                                    <i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span>
                                                
                                                @else
                                                
                                                    <i class="fa fa-ban cart-product-selected-store me-1"></i> <span style="color: red">کالا ناموجود است</span>

                                                @endif

                                            </p>



                                            <p>
                                                <button type="button" class="btn btn-light  btn-sm text-decoration-none" data-url="{{ route('customer.market.product.add-to-favorite',$product) }}" id="add_to_favorite" href="#">
                                                    
                                                    @guest    

                                                        <i class="fa fa-heart text-dark"></i> <span id="add-to-favorite-span">افزودن به علاقه مندی</span>

                                                    @endguest


                                                    @auth

                                                        @if ($product->users->contains(auth()->user()->id))

                                                            <i class="fa fa-heart text-danger"></i> <span id="add-to-favorite-span">حذف از علاقه مندی ها</span>

                                                        @else

                                                            <i class="fa fa-heart text-dark"></i> <span id="add-to-favorite-span">افزودن به علاقه مندی</span>

                                                        @endif


                                                    @endauth

                                                </button>
                                            </p>


                                            @php
                                            // if product is not marketable or its finished dont show the price
                                            @endphp
                                            @if ($product->marketable != 0 && $product->marketable_number > 0)

                                                <section>
                                                    <section class="cart-product-number d-inline-block ">
                                                        <button class="cart-number cart-number-down" type="button">-</button>
                                                        <input class="" type="number" min="1" max="{{ $product->marketable_number }}" step="1" value="1" readonly="readonly" id="number" name="number">
                                                        <button class="cart-number cart-number-up" type="button">+</button>
                                                    </section>
                                                </section>
                                                
                                            @endif
                                            <p class="mb-3 mt-5">
                                                <i class="fa fa-info-circle me-1"></i>کاربر گرامی  خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد. پس از ثبت سفارش کالا بر اساس نحوه ارسال که شما انتخاب کرده اید کالا برای شما در مدت زمان مذکور ارسال می گردد.
                                            </p>
                                    </section>
                                </section>

                            </section>
                            <!-- end product info -->

                            <section class="col-md-3">
                                <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                    


                                    @php
                                        // if product is not marketable or its finished dont show the price
                                    @endphp
                                    @if ($product->marketable != 0 && $product->marketable_number > 0)

                                        <section class="d-flex justify-content-between align-items-center">
                                            <p class="text-muted">قیمت کالا</p>
                                            <p class="text-muted">
                                                <span id="product_price" data-product-original-price="{{ $product->price }}" ></span>
                                                <span class="small">تومان</span></p>
                                        </section>

                                        @php
                                            
                                            $amazingDiscount = $product->activeAmazingDiscount;

                                            if (!empty($amazingDiscount))
                                            {
                                                $amazingDiscountAmount = $product->price * $amazingDiscount->percent / 100;
                                            }
                                            else 
                                            {
                                                $amazingDiscountAmount = 0;
                                            }
                                        @endphp

                                        @if (!empty($amazingDiscount))
                                            
                                            <section class="d-flex justify-content-between align-items-center">
                                                <p class="text-muted">تخفیف کالا</p>
                                                <p class="text-danger fw-bolder" > 
                                                    <span id="product-discount-price" data-product-discount-price="{{ $amazingDiscountAmount }}" data-product-discount-percentage="{{ $amazingDiscount->percent }}">
                                                        
                                                    </span>
                                                    <span class="small">تومان</span></p>
                                            </section>

                                        @endif

                                        <section class="border-bottom mb-3"></section>

                                        <section class="d-flex justify-content-end align-items-center">
                                            <p class="fw-bolder">
                                                <span id="final-price"></span>
                                                <span class="small">تومان</span>
                                            </p>
                                        </section>
                                        
                                    @endif





                                    <section class="">

                                        
                                    @if ($product->marketable == 0)
                                    
                                        <a id="next-level" href="#" class="btn btn-secondary d-block disabled"> کالا ناموجود است</a>

                                    @elseif ($product->marketable_number > 0)

                                        <button id="next-level" onclick="document.getElementById('add_to_cart')" class="btn btn-danger d-block w-100">افزودن به سبد خرید</button>

                                    @else
                                    
                                        <a id="next-level" href="#" class="btn btn-secondary d-block disabled"> کالا ناموجود است</a>

                                    @endif

                                    </section>
                                </form>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>

            </section>
        </section>
        <!-- end cart -->



        <!-- start product lazy load -->
        <section class="mb-4">
            <section class="container-xxl" >
                <section class="row">
                    <section class="col">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <!-- start vontent header -->
                            <section class="content-header">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title">
                                        <span>کالاهای مرتبط</span>
                                    </h2>
                                    <section class="content-header-link">
                                        <!--<a href="#">مشاهده همه</a>-->
                                    </section>
                                </section>
                            </section>
                            <!-- start vontent header -->
                            <section class="lazyload-wrapper" >
                                <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                    
                                @foreach ($relatedProducts as $relatedProduct )
                                    

                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                {{-- <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section> --}}
                                                @guest
                                                        
                                                        <section class="product-add-to-favorite">
                                                            <button class=" btn btn-light text-decoration-none btn-sm" data-url="{{ route('customer.market.product.add-to-favorite',$relatedProduct) }}" href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی">
                                                                <i class="fa fa-heart text-dark"></i>
                                                            </button>
                                                        </section> 

                                                    @endguest

                                                    @auth
                                                        
                                                        @if ($relatedProduct->users->contains(auth()->user()->id))
                                                            

                                                            <section class="product-add-to-favorite">
                                                                <button class=" btn btn-light text-decoration-none btn-sm" data-url="{{ route('customer.market.product.add-to-favorite',$relatedProduct) }}" href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="حذف از علاقه مندی">
                                                                    <i class="fa fa-heart text-danger"></i>
                                                                </button>
                                                            </section> 
                                                            
                                                        @else
                                                            
                                                            <section class="product-add-to-favorite">
                                                                <button class=" btn btn-light text-decoration-none btn-sm" data-url="{{ route('customer.market.product.add-to-favorite',$relatedProduct) }}" href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی">
                                                                    <i class="fa fa-heart text-dark"></i>
                                                                </button>
                                                            </section> 
                                                            
                                                        @endif

                                                    @endauth
                                                <a class="product-link" href="{{ route('customer.market.product.index' , $relatedProduct->slug ) }}">
                                                    <section class="product-image">
                                                        <img class="" src="{{ asset($relatedProduct->image['indexArray']['medium']) }}" alt="{{ $relatedProduct->name }}">
                                                    </section>
                                                    {{-- <section class="product-colors"></section> --}}
                                                    <section class="product-name">
                                                        <h3>
                                                            {{ Str::limit($relatedProduct->name, 20, '...') }}
                                                        </h3>
                                                    </section>
                                                    <section class="product-price-wrapper">
                                                        {{-- <section class="product-discount">
                                                            <span class="product-old-price">6,895,000 </span>
                                                            <span class="product-discount-amount">10%</span>
                                                        </section> --}}
                                                        <section class="product-price">{{ $relatedProduct->price }} تومان</section>
                                                    </section>
                                                    <section class="product-colors">
                                                        @foreach ($relatedProduct->colors as $color)
                                                            
                                                            <section class="product-colors-item" style="background-color: {{ $color->color }};"></section>
                                                            
                                                        @endforeach
                                                    </section>
                                                </a>
                                            </section>
                                        </section>
                                    </section>


                                @endforeach

                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
        <!-- end product lazy load -->

        <!-- start description, features and comments -->
        <section class="mb-4">
            <section class="container-xxl" >
                <section class="row">
                    <section class="col">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <!-- start content header -->
                            <section id="introduction-features-comments" class="introduction-features-comments">
                                <section class="content-header">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title">
                                            <span class="me-2"><a class="text-decoration-none text-dark" href="#introduction">معرفی</a></span>
                                            <span class="me-2"><a class="text-decoration-none text-dark" href="#features">ویژگی ها</a></span>
                                            <span class="me-2"><a class="text-decoration-none text-dark" href="#comments">دیدگاه ها</a></span>
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                            </section>
                            <!-- start content header -->

                            <section class="py-4">

                                <!-- start vontent header -->
                                <section id="introduction" class="content-header mt-2 mb-4">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            معرفی
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="product-introduction mb-4">
                                    {!! $product->introduction !!}
                                </section>

                                <!-- start vontent header -->
                                <section id="features" class="content-header mt-2 mb-4">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            ویژگی ها
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="product-features mb-4 table-responsive">
                                    <table class="table table-bordered border-white">

                                        @foreach ($product->values as $value)
                                            
                                            <tr>
                                                <td>{{ $value->attribute->name }}</td>
                                                <td>{{ json_decode($value->value)->value }} {{ $value->attribute->unit }}</td>
                                            </tr>

                                        @endforeach  

                                        @foreach ($product->metas as $meta)
                                            
                                            <tr>
                                                <td>{{ $meta->meta_key }}</td>
                                                <td>{{ $meta->meta_value }}</td>
                                            </tr>

                                        @endforeach    
                                        
                                    </table>
                                </section>

                                <!-- start vontent header -->
                                <section id="comments" class="content-header mt-2 mb-4">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            دیدگاه ها
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="product-comments mb-4">

                                    <section class="comment-add-wrapper">
                                        <button class="comment-add-button" type="button" data-bs-toggle="modal" data-bs-target="#add-comment" ><i class="fa fa-plus"></i> افزودن دیدگاه</button>
                                        <!-- start add comment Modal -->
                                        <section class="modal fade" id="add-comment" tabindex="-1" aria-labelledby="add-comment-label" aria-hidden="true">
                                            <section class="modal-dialog">
                                                <section class="modal-content">
                                                    <section class="modal-header">
                                                        <h5 class="modal-title" id="add-comment-label"><i class="fa fa-plus"></i> افزودن دیدگاه</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </section>


                                                    @guest
                                                        
                                                        <section class="modal-body">

                                                            <p>
                                                                کاربر گرامی لطفا برای ثبت نظر وارد حساب کاربری خود شوید.
                                                            </p>
                                                            <p>
                                                                برای ورود یا ثبت نام <a class="px-1 text-decoration-none bg-danger rounded-pill text-light" href="{{ route('auth.customer.login-register') }}">اینجا کلیک کنید</a>  
                                                            </p>

                                                        </section>


                                                    @endguest



                                                    @auth
                                                    
                                                            <section class="modal-body">

                                                                <form class="row" action="{{ route('customer.market.product.add-comment' , $product->slug) }}" method="POST">
                                                                    @csrf
                                                                    {{-- 
                                                                    <section class="col-6 mb-2">
                                                                        <label for="first_name" class="form-label mb-1">نام</label>
                                                                        <input type="text" class="form-control form-control-sm" id="first_name" placeholder="نام ...">
                                                                    </section>

                                                                    <section class="col-6 mb-2">
                                                                        <label for="last_name" class="form-label mb-1">نام خانوادگی</label>
                                                                        <input type="text" class="form-control form-control-sm" id="last_name" placeholder="نام خانوادگی ...">
                                                                    </section> --}}

                                                                    <section class="col-12 mb-2">
                                                                        <label for="comment" class="form-label mb-1">دیدگاه شما</label>
                                                                        <textarea name="body" class="form-control form-control-sm" id="comment" placeholder="دیدگاه شما ..." rows="4"></textarea>
                                                                    </section>



                                                                
                                                            </section>


                                                            <section class="modal-footer py-1">
                                                                <button type="submit" class="btn btn-sm btn-primary">ثبت دیدگاه</button>
                                                                <button type="button" class="btn btn-sm btn-danger" data-bs-dismiss="modal">بستن</button>
                                                            </section>

                                                        </form>

                                                        @endauth
                                                    


                                                </section>
                                            </section>
                                        </section>
                                    </section>




                                    @foreach ($product->activeComments as $comment)

                                        <section class="product-comment ">
                                            @php
                                                if (empty($comment->user->first_name) && empty($comment->user->last_name))
                                                {

                                                    $author = 'بدون نام';
                                                }else {

                                                    $author = $comment->user->fullName;
                                                }
                                            @endphp

                                            <section class="product-comment-header d-flex justify-content-start">
                                                <section class="product-comment-title ">{{ $author }}</section>
                                                <section class="product-comment-date px-3">{{ jalaliDateAgo($comment->created_at) }}</section>
                                            </section>
                                            <section class="product-comment-body px-3 @if ($comment->children->count() > 0) border-bottom  @endif">
                                                {!! $comment->body !!}
                                            </section>



                                                {{-- answers --}}
                                                @foreach ($comment->children as $answer)

                                                    <section class="product-comment ">
                                                        @php
                                                            if (empty($answer->user->first_name) && empty($answer->user->last_name))
                                                            {

                                                                $author = 'بدون نام';
                                                            }else {

                                                                $author = $answer->user->fullName;
                                                            }
                                                        @endphp

                                                        <section class="product-comment-header d-flex justify-content-start">
                                                            <section class="product-comment-title ">{{ $author }}</section>
                                                            <section class="product-comment-date px-3">{{ jalaliDateAgo($answer->created_at) }}</section>
                                                        </section>
                                                        <section class="product-comment-body px-3 ">
                                                            {!! $answer->body !!}
                                                        </section>
                                                    </section>
                                            
                                                @endforeach

                                        </section>
                                        
                                    @endforeach



                                </section>
                            </section>

                        </section>
                    </section>
                </section>
            </section>
        </section>
        <!-- end description, features and comments -->


@include('customer.alerts.toast.login-signup')



@endsection

@section('script')
    
    <script>

        $(document).ready(function () {
            // from the beginning of the page calculate the price
            bill();
            //input color
            $('input[name="color"]').change(function () {
                
                bill();
            });
            //input guarantee
            $('select[name="guarantee"]').change(function () {
                
                bill();
            });
            //input count
            $('.cart-number').click(function () {

                bill();
            });


        });

        function bill()
        {
            if($('input[name="color"]:checked').length != 0)
            {
                var selected_color = $('input[name="color"]:checked');
                $("#selected_color_name").html(selected_color.attr('data-color-name'));
            }

            // price computing
            var selected_color_price = 0;
            var selected_guarantee_price = 0;
            var number = 1;
            var product_discount_percentage = parseFloat($('#product-discount-price').attr('data-product-discount-percentage')) ? parseFloat($('#product-discount-price').attr('data-product-discount-percentage')) : 0;
            var product_original_price = parseFloat($('#product_price').attr('data-product-original-price'));



            if($('input[name="color"]:checked').length != 0)
            {
                selected_color_price = parseFloat(selected_color.attr('data-color-price'));
            }

            if($('#guarantee option:selected').length != 0)
            {
                selected_guarantee_price = parseFloat($('#guarantee option:selected').attr('data-guarantee-price'));
            }

            
            if($('#number').val() > 0)
            {
                number = $('#number').val();
            }


            // single product price calculation with properties
            var product_price = (product_original_price + selected_color_price + selected_guarantee_price);
            // multi products prices calculations with properties
            var total_products_prices = number * product_price;
            // single discounted price after calculation
            var single_product_price_after_discount = product_price * product_discount_percentage / 100;
            // multi discounted prices after calculations
            var total_product_discount_price = Math.floor( number * single_product_price_after_discount );
            // single product price after discount calculation
            var product_price_after_discount = ( product_price - single_product_price_after_discount );
            // multi products prices after discount calculations
            var final_price = Math.floor( number * product_price_after_discount );


            $('#product_price').html(toFarsiDigits(total_products_prices));
            $('#product-discount-price').html(toFarsiDigits(total_product_discount_price));
            $('#final-price').html(toFarsiDigits(final_price));





        }


        function toFarsiDigits(number)
        {
            const farsiDigits = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
            // add comma
            number = new Intl.NumberFormat().format(number);
            // convert number to persian
            return number.toString().replace(/\d/g, x => farsiDigits[x]);
        }

    
        // for related products
        $('.product-add-to-favorite button').click(function(){

            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url : url,
                success : function(result){
                    if (result.status == 1)
                    {
                        $(element).children().first().removeClass('text-dark');
                        $(element).children().first().addClass('text-danger');
                        $(element).attr('data-original-title', 'حذف از علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'حذف از علاقه مندی ها');
                    }
                    else if(result.status == 2 )
                    {
                        $(element).children().first().removeClass('text-danger');
                        $(element).children().first().addClass('text-dark');
                        $(element).attr('data-original-title', 'افزودن به علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'افزودن به علاقه مندی ها');
                    }
                    else if (result.status == 3 )
                    {
                        $('.toast').toast('show');
                    }
                }
            });
        });

        // for the main product
        $('#add_to_favorite').click(function(){

        var url = $(this).attr('data-url');
        var element = $(this);
        $.ajax({
            url : url,
            success : function(result){
                if (result.status == 1)
                {
                    $(element).children().first().removeClass('text-dark');
                    $(element).children().first().addClass('text-danger');
                    $('#add-to-favorite-span').html('حذف از علاقه مندی ها');
                }
                else if(result.status == 2 )
                {
                    $(element).children().first().removeClass('text-danger');
                    $(element).children().first().addClass('text-dark');
                    $('#add-to-favorite-span').html('افزودن به علاقه مندی');
                }
                else if (result.status == 3 )
                {
                    $('.toast').toast('show');
                }
            }
        });
        });

    </script>

    <script>
        
        //start product introduction, features and comment
        $(document).ready(function() {
            var s = $("#introduction-features-comments");
            var pos = s.position();
            $(window).scroll(function() {
                var windowpos = $(window).scrollTop();

                if (windowpos >= pos.top) {
                    s.addClass("stick");
                } else {
                    s.removeClass("stick");
                }
            });
        });
        //end product introduction, features and comment

    </script>
@endsection


