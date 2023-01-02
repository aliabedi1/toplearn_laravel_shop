<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Content\Banner;
use App\Models\Market\Brand;
use App\Models\Market\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    

    public function home()
    {
        // banners
        $slideShowImages = Banner::where('position', 0)->where('status', 1)->get();
        $topBanners = Banner::where('position', 1)->where('status', 1)->take(2)->get();
        $middleBanners = Banner::where('position', 2)->where('status', 1)->take(2)->get();
        $bottomBanner = Banner::where('position', 3)->where('status', 1)->first();


        // brands
        $brands = Brand::where('status', 1)->get();


        // products
        $mostVisitedProducts = Product::latest()->take(10)->get();
        $offeredProducts = Product::latest()->take(10)->get();

        return view('customer.home',compact('slideShowImages','topBanners','middleBanners','bottomBanner','brands','mostVisitedProducts','offeredProducts'));
    }


}
