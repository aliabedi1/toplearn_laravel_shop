@extends('customer.layouts.master-two-col')

@section('head-tag')
<title>سبد خرید شما</title>
@endsection



@section('content')
    



    <section class="mb-4">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>سبد خرید شما</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>

                    <section class="row mt-4">
                        <section class="col-md-9 mb-3">

                            <form action="" method="post"  class="content-wrapper bg-white p-3 rounded-2" id="cart_item">
                                @csrf

                                @php
                                    $totalProductPrice = 0;
                                    $totalProductDiscount = 0;
                                @endphp


                                @foreach ($cartItems as $cartItem )
                                    

                                    @php
                                        $totalProductPrice += $cartItem->cartItemProductPrice();
                                        $totalProductDiscount += $cartItem->cartItemProductDiscount();
                                    @endphp


                                    <section class="cart-item d-md-flex py-3">
                                        <section class="cart-img align-self-start flex-shrink-1">
                                            <a href="{{ route('customer.market.product.index', $cartItem->product) }}" class="text-decoration-none text-dark">
                                                <img src="{{ asset($cartItem->product->image['indexArray']['medium']) }}" alt="{{ $cartItem->product->name }}">
                                            </a>

                                            
                                        </section>
                                        <section class="align-self-start w-100">
                                            
                                            <a href="{{ route('customer.market.product.index', $cartItem->product) }}" class="text-decoration-none text-dark">
                                                <p class="fw-bold">{{ $cartItem->product->name }}</p>
                                            </a>

                                            @if (!empty($cartItem->color))
                                                <p>
                                                    <span style="background-color: {{ $cartItem->color->color }};" class="cart-product-selected-color me-1"></span> 
                                                    <span> {{ $cartItem->color->color_name }}</span>
                                                </p>
                                            @else
                                                <p>
                                                    <span>
                                                        رنگی انتخاب نشده است
                                                    </span>
                                                </p>
                                            @endif

                                            
                                            @if (!empty($cartItem->guarantee))
                                                <p>
                                                    <i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                                    <span> {{ $cartItem->guarantee->name }}</span>
                                                </p>
                                            @else
                                                <p>
                                                    <i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                                    <span>بدون گارانتی</span>
                                                </p>
                                            @endif
                                            

                                            @if ($cartItem->product->marketable_number > 0)
                                                <p>
                                                    <i class="fa fa-store-alt cart-product-selected-store me-1"></i>
                                                    <span>کالا موجود در انبار</span>
                                                </p>
                                            @else
                                                <p>
                                                    <i class="fa fa-ban cart-product-selected-store me-1"></i>
                                                    <span>کالا ناموجود است</span>
                                                </p>
                                            @endif

                                            <section>
                                                <section class="cart-product-number d-inline-block ">
                                                    <button class="cart-number cart-number-down" type="button">-</button>
                                                    <input class="number" data-product-price="{{ $cartItem->cartItemProductPrice() }}" data-product-discount="{{ $cartItem->cartItemProductDiscount() }}" type="number" min="1" max="5" step="1" value="{{ $cartItem->number }}" readonly="readonly">
                                                    <button class="cart-number cart-number-up" type="button">+</button>
                                                </section>
                                                <a class="text-decoration-none ms-4 cart-delete" href="{{ route('customer.sales-process.remove-from-cart', $cartItem) }}"><i class="fa fa-trash-alt"></i> حذف از سبد</a>
                                            </section>

                                        </section>
                                        <section class="align-self-end flex-shrink-1">

                                            @if ($cartItem->cartItemProductDiscount() > 0)
                                                <section class="cart-item-discount text-danger text-nowrap mb-1">تخفیف {{ priceFormat($cartItem->cartItemProductDiscount()) }}</section>
                                            @endif

                                            <section class="text-nowrap fw-bold">{{ priceFormat($cartItem->cartItemProductPrice()) }} تومان</section>

                                        </section>
                                    </section>

                                    

                                @endforeach

                            </form>
                                
                        </section>
                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالاها ({{ priceFormat($cartItems->count()) }})</p>
                                    <p class="text-muted">
                                        <span id="total_product_price">
                                            {{ priceFormat($totalProductPrice) }}
                                        </span>
                                        تومان
                                    </p>
                                </section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">تخفیف کالاها</p>
                                    <p class="text-danger fw-bolder">
                                        <span id="total_discount">
                                            {{ priceFormat($totalProductDiscount) }}
                                        </span>
                                        تومان
                                    </p>
                                </section>
                                <section class="border-bottom mb-3"></section>
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">جمع سبد خرید</p>
                                    <p class="fw-bolder">
                                        <span id="total_price">
                                            {{ priceFormat($totalProductPrice - $totalProductDiscount) }}
                                        </span>
                                        تومان
                                    </p>
                                </section>

                                <p class="my-3">
                                    <i class="fa fa-info-circle me-1"></i>کاربر گرامی  خرید شما هنوز نهایی نشده است. برای ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت این سفارش صورت میگیرد.
                                </p>


                                <section class="">
                                    <a href="address.html" class="btn btn-danger d-block">تکمیل فرآیند خرید</a>
                                </section>

                            </section>
                        </section>
                    </section>
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->




    <section class="mb-4">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>کالاهای مرتبط با سبد خرید شما</span>
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




@endsection

@section('script')
    
    <script>

        
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
        
        // calculating price
        $(document).ready(function(){
            bill();

            // change number of products
            $('.cart-number').click(function(){
                bill();
            });
        });

        function bill()
        {
            var total_product_price = 0;
            var total_discount = 0;
            var total_price = 0;

            $('.number').each(function(){
                var productPrice = parseFloat($(this).data('product-price'));
                var productDiscount = parseFloat($(this).data('product-discount'));
                var number = parseFloat($(this).val());

                total_product_price += productPrice * number;
                total_discount += productDiscount * number;
            });

            total_price = total_product_price - total_discount;

            $('#total_product_price').html(toFarsiDigits(total_product_price));
            $('#total_discount').html(toFarsiDigits(total_discount));
            $('#total_price').html(toFarsiDigits(total_price));




        }

        
        function toFarsiDigits(number)
        {
            const farsiDigits = ['۰','۱','۲','۳','۴','۵','۶','۷','۸','۹'];
            // add comma
            number = new Intl.NumberFormat().format(number);
            // convert number to persian
            return number.toString().replace(/\d/g, x => farsiDigits[x]);
        }


    </script>

@endsection