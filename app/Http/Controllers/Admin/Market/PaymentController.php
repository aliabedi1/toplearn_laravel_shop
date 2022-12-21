<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('admin.market.payment.index' , compact('payments'));
    }


    public function offline()
    {
        
        $payments = Payment::where('paymentable_type' , 'App\Models\Market\OfflinePayment')->get();
        return view('admin.market.payment.index' , compact('payments'));

    }


    public function online()
    {
        $payments = Payment::where('paymentable_type' , 'App\Models\Market\OnlinePayment')->get();
        return view('admin.market.payment.index' , compact('payments'));

    }


    public function cash()
    {
        $payments = Payment::where('paymentable_type' , 'App\Models\Market\CashPayment')->get();
        return view('admin.market.payment.index' , compact('payments'));

    }


    public function canceled(Payment $payment)
    {
        $payment->status = 2;
        $payment->update();

        return redirect()->route('admin.market.payment.index')->with('swal-success', 'پرداخت با موفقیت لغو شد');
    }


    public function returned(Payment $payment)
    {
        $payment->status = 3;
        $payment->update();

        return redirect()->route('admin.market.payment.index')->with('swal-success', 'پرداخت با موفقیت بازگردانده شد');
     }
}
