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

    
    public function changeSendStatus(Order $order)
    {
        switch($order->delivery_status)
        {
            case 0:
                $order->delivery_status = 1;
                break;
            case 1:
                $order->delivery_status = 2;
                break;
            case 2:
                $order->delivery_status = 3;
                break;
            default:
                $order->delivery_status = 0;
            
        }
        $order->save();
        return back()->with('swal-success', ' وضعیت ارسال با موفقیت تغییر کرد');
    }

    
    public function changeOrderStatus(Order $order)
    {

        // case 0 is for not checked and case 4 is for canceling which they have their own section to change their status

        switch($order->status)
        {
            case 1:
                $order->status = 2;
                break;
            case 2:
                $order->status = 3;
                break;
            case 3:
                $order->status = 5;
                break;
            default:
                $order->status = 1;
            
        }
        $order->save();
        return back()->with('swal-success', ' وضعیت سفارش با موفقیت تغییر کرد');
    }

    
    public function cancelOrder( Order $order)
    {
        $order->delivery_status = 4;
        return back()->with('swal-success', 'سفارش با موفقیت باطل شد');

    }

    
}
