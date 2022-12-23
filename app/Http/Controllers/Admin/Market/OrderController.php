<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function newOrders()
    {

        return view('admin.market.order.index');
    }

    
    public function sending()
    {

        return view('admin.market.order.index');
    }

    
    public function unpaid()
    {

        return view('admin.market.order.index');
    }

    
    public function canceled()
    {

        return view('admin.market.order.index');
    }

    
    public function returned()
    {

        return view('admin.market.order.index');
    }

    
    public function all()
    {
        $orders = Order::all();
        return view('admin.market.order.index', compact('orders'));
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
