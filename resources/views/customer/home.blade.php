@extends('customer.layouts.master-one-col')

@section('content')
    





    <!-- start slideshow -->
    <section class="container-xxl my-4">
        <section class="row">
            <section class="col-md-8 pe-md-1 ">
                <section id="slideshow" class="owl-carousel owl-theme">
                    
                    @foreach ($slideShowImages as $slideShowImage)
                        
                        <section class="item">
                            <a class="w-100 d-block h-auto text-decoration-none" href="{{ urldecode($slideShowImage->url) }}">
                                <img class="w-100 rounded-2 d-block h-auto" src="{{ asset($slideShowImage->image) }}" alt="{{ $slideShowImage->title }}">
                            </a>
                        </section>

                    @endforeach
                    
                </section>
            </section>
            <section class="col-md-4 ps-md-1 mt-2 mt-md-0">


                @foreach ($topBanners as $topBanner)

                    <section class="mb-2">
                        <a href="{{ urldecode($topBanner->url) }}" class="d-block">
                            <img class="w-100 rounded-2 d-block h-auto" src="{{ asset($topBanner->image) }}" alt="{{ $topBanner->title }}">
                        </a>
                    </section>
                
                @endforeach
                
            </section>
        </section>
    </section>
    <!-- end slideshow -->



    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پربازدیدترین کالاها</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="#">مشاهده همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper" >
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                @foreach ($mostVisitedProducts as $mostVisitedProduct )
                                    

                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                {{-- {{-- <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section> --}}
                                                @guest
                                                    
                                                    <section class="product-add-to-favorite">
                                                        <button class=" btn btn-light text-decoration-none btn-sm" data-url="{{ route('customer.market.product.add-to-favorite',$mostVisitedProduct) }}" href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی">
                                                            <i class="fa fa-heart text-dark"></i>
                                                        </button>
                                                    </section> 

                                                @endguest

                                                @auth
                                                    
                                                    @if ($mostVisitedProduct->users->contains(auth()->user()->id))
                                                        

                                                        <section class="product-add-to-favorite">
                                                            <button class=" btn btn-light text-decoration-none btn-sm" data-url="{{ route('customer.market.product.add-to-favorite',$mostVisitedProduct) }}" href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart text-danger"></i>
                                                            </button>
                                                        </section> 
                                                        
                                                    @else
                                                        
                                                        <section class="product-add-to-favorite">
                                                            <button class=" btn btn-light text-decoration-none btn-sm" data-url="{{ route('customer.market.product.add-to-favorite',$mostVisitedProduct) }}" href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی">
                                                                <i class="fa fa-heart text-dark"></i>
                                                            </button>
                                                        </section> 
                                                        
                                                    @endif

                                                @endauth


                                                <a class="product-link" href="{{ route('customer.market.product.index' , $mostVisitedProduct->slug ) }}">
                                                    <section class="product-image">
                                                        <img class="" src="{{ asset($mostVisitedProduct->image['indexArray']['medium']) }}" alt="{{ $mostVisitedProduct->name }}">
                                                    </section>
                                                    {{-- <section class="product-colors"></section> --}}
                                                    <section class="product-name">
                                                        <h3>
                                                            {{ Str::limit($mostVisitedProduct->name, 20, '...') }}
                                                        </h3>
                                                    </section>
                                                    <section class="product-price-wrapper">
                                                        {{-- <section class="product-discount">
                                                            <span class="product-old-price">6,895,000 </span>
                                                            <span class="product-discount-amount">10%</span>
                                                        </section> --}}
                                                        <section class="product-price">{{ $mostVisitedProduct->price }} تومان</section>
                                                    </section>
                                                    <section class="product-colors">
                                                        
                                                        @foreach ($mostVisitedProduct->colors as $color)
                                                            
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



    <!-- start ads section -->
    <section class="mb-3">
        <section class="container-xxl">
            <!-- two column-->
            <section class="row py-4">
                @foreach ($middleBanners as $middleBanner)
                    
                    <section class="col-12 col-md-6 mt-2 mt-md-0">
                        <img class="d-block rounded-2 w-100" src="{{ asset($middleBanner->image) }}" alt="{{ asset($middleBanner->title) }}">
                    </section>

                @endforeach
            </section>

        </section>
    </section>
    <!-- end ads section -->


    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پیشنهاد ستاره شمال به شما</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="#">مشاهده همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper" >
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">


                                @foreach ($offeredProducts as $offeredProduct )
                                    

                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                {{-- <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section>
                                                <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به علاقه مندی"><i class="fa fa-heart"></i></a></section> --}}
                                                <a class="product-link" href="{{ route('customer.market.product.index' , $offeredProduct->slug ) }}">
                                                    <section class="product-image">
                                                        <img class="" src="{{ asset($offeredProduct->image['indexArray']['medium']) }}" alt="{{ $offeredProduct->name }}">
                                                    </section>
                                                    {{-- <section class="product-colors"></section> --}}
                                                    <section class="product-name">
                                                        <h3>
                                                            {{ Str::limit($offeredProduct->name, 20, '...') }}
                                                        </h3>
                                                    </section>
                                                    <section class="product-price-wrapper">
                                                        {{-- <section class="product-discount">
                                                            <span class="product-old-price">6,895,000 </span>
                                                            <span class="product-discount-amount">10%</span>
                                                        </section> --}}
                                                        <section class="product-price">{{ $offeredProduct->price }} تومان</section>
                                                    </section>
                                                    <section class="product-colors">

                                                        @foreach ($offeredProduct->colors as $color)
                                                            
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


    <!-- start ads section -->
    <section class="mb-3">
        <section class="container-xxl">
            <!-- one column -->
            <section class="row py-4">
                <section class="col">

                    @if (!empty($bottomBanner))
                        
                        <img class="d-block rounded-2 w-100" src="{{ asset($bottomBanner->image) }}" alt="{{ asset($bottomBanner->title) }}">
                    
                    @endif

                </section>
            </section>

        </section>
    </section>
    <!-- end ads section -->



    <!-- start brand part-->
    <section class="brand-part mb-4 py-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex align-items-center">
                            <h2 class="content-header-title">
                                <span>برندهای ویژه</span>
                            </h2>
                        </section>
                    </section>
                    <!-- start vontent header -->
                    <section class="brands-wrapper py-4" >
                        <section class="brands dark-owl-nav owl-carousel owl-theme">
                            @foreach ($brands as $brand)
                                
                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#">
                                            <img class="rounded-2" src="{{ asset($brand->logo['indexArray']['medium']) }}" alt="{{ $brand->original_name }}">
                                        </a>
                                    </section>
                                </section>
                                
                            @endforeach

                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end brand part-->



    <section class="position-fixed p-4 flex-row-reverse " style="z-index: 99999999; left: 0; top: 3rem; width:26rem; max-width:80%;">

        <section class="toast" data-delay="7000">

            <section class="toast-body py-3 d-flex text-dark bg-info">

                <strong class="ml-auto">
                    برای افزودن کالا به لیست علاقه مندی ها باید وارد حساب کاربری خود شوید
                    <br>

                    <a href="{{ route('auth.customer.login-register-form') }}" class="text-dark">
                        ثبت نام / ورود
                    </a>

                    <button type="button" class="mr-2 mb-1 close btn btn-danger text-decoration-none" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </strong>

            </section>

        </section>

    </section>



@endsection

@section('script')

    <script>
            
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

    </script>
    
@endsection