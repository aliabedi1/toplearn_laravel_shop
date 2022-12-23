<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function newOrders()
    {

        $title = 'سفارشات جدید';
        $orders = Order::where('status' , 0)->orderBy('created_at', 'desc')->get();
        return view('admin.market.order.index', compact('orders','title'));
    }

    
    public function sending()
    {
        $title = 'سفارشات درحال ارسال';
        $orders = Order::where('delivery_status' , 1)->orderBy('created_at', 'desc')->get();
        return view('admin.market.order.index', compact('orders','title'));
    }

    
    public function unpaid()
    {
        $title = 'سفارشات پرداخت نشده';
        $orders = Order::where('payment_status' , 0)->orderBy('created_at', 'desc')->get();
        return view('admin.market.order.index', compact('orders','title'));
    }

    
    public function canceled()
    {
        $title = 'سفارشات باطل شده';
        $orders = Order::where('status' , 4)->orderBy('created_at', 'desc')->get();
        return view('admin.market.order.index', compact('orders','title'));
    }

    
    public function returned()
    {
        $title = 'سفارشات مرجوعی';
        $orders = Order::where('status' , 5)->orderBy('created_at', 'desc')->get();
        return view('admin.market.order.index', compact('orders','title'));
    }

    
    public function all()
    {
        $title = 'تمام سفارشات';
        $orders = Order::all();
        return view('admin.market.order.index', compact('orders','title'));
    }

    
    public function show()
    {

        return view('admin.market.order.index');
    }

    
    public function changeSendStatus()
    {

        return view('admin.market.order.index');
    }

    
    public function changeOrderStatus()
    {

        return view('admin.market.order.index');
    }

    
    public function cancelOrder()
    {

        return view('admin.market.order.index');
    }

    
}
