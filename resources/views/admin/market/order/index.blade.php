@extends('admin.layouts.master')

@section('head-tag')
<title>{{ $title }}</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> {{ $title }}</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 {{ $title }}
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="" class="btn btn-info btn-sm disabled">ایجاد سفارش </a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover h-150px">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>کد سفارش</th>
                            <th>(بدون تخفیف) مبلغ سفارش</th>
                            <th>مبلغ تمامی تخفیف ها</th>
                            <th>مبلغ تخفیف تمام محصولات</th>
                            <th>مبلغ نهایی پرداخت شده</th>
                            <th>وضعیت پرداخت</th>
                            <th>شیوه پرداخت</th>
                            <th>بانک</th>
                            <th>وضعیت ارسال</th>
                            <th>شیوه ارسال</th>
                            <th>وضعیت سفارش</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order )
                            
                            <tr>
                                <th><div class="py-3">{{ $loop->iteration }}</div></th>

                                <td><div class="py-3">{{ $order->id }}</div> </td>

                                <td><div class="py-3">{{ $order->order_final_amount }} تومان</div> </td>

                                <td><div class="py-3">{{ $order->order_discount_amount }} تومان</div> </td>

                                <td><div class="py-3">{{ $order->order_total_products_discount_amount }} تومان</div> </td>

                                @php
                                $final_paid_amount = number_format(($order->order_final_amount - $order->order_discount_amount), 3, '.', '');
                                @endphp

                                <td><div class="py-3">{{ $final_paid_amount }} تومان</div></td>

                                <td><div class="py-3"> @if ($order->payment_status == 0) پرداخت نشده @elseif ($order->payment_status == 1 ) پرداخت شده @elseif ($order->payment_status == 2) لغو شده @elseif ($order->payment_status == 3) برگشت داده شده @endif</div> </td>

                                <td><div class="py-3"> @if ($order->payment_type == 0) آنلاین @elseif ($order->payment_type == 1 ) آفلاین @else پرداخت در محل @endif </div> </td>
                                
                                <td><div class="py-3">{{ $order->payment->paymentable->gateway ?? 'ندارد' }}</div> </td>
                                
                                <td><div class="py-3"> @if ($order->delivery_status == 0) ارسال نشده @elseif ($order->delivery_status == 1 ) درحال ارسال @elseif ($order->delivery_status == 2) ارسال شده @elseif ($order->delivery_status == 3) تحویل داده شده @endif</div> </td>
                                
                                <td><div class="py-3">{{ $order->delivery->name }}</div> </td>

                                <td><div class="py-3"> @if ($order->status == 0) بررسی نشده @elseif ($order->status == 1) تایید نشده @elseif ($order->status == 2 ) در انتظار تایید @elseif ($order->status == 3) تایید شده @elseif ($order->status == 4) باطل شده @elseif ($order->status == 5) مرجوع شده @endif</div> </td>
                                <td class="width-8-rem text-left">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-success btn-sm btn-block dorpdown-toggle py-3" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                            <i class="fa fa-tools"></i> عملیات
                                        </a>
                                        <div class="dropdown-menu z-index-highest" aria-labelledby="dropdownMenuLink">
                                            <a href="{{ route('admin.market.order.show', $order->id) }}" class="dropdown-item text-right"><i class="fa fa-images"></i> مشاهده فاکتور</a>
                                            <a href="{{ route('admin.market.order.changeSendStatus', $order->id) }}" class="dropdown-item text-right"><i class="fa fa-list-ul"></i> تغییر وضعیت ارسال</a>
                                            <a href="{{ route('admin.market.order.changeOrderStatus', $order->id) }}" class="dropdown-item text-right"><i class="fa fa-edit"></i> تغییر وضعیت سفارش</a>
                                            <a href="{{ route('admin.market.order.cancelOrder', $order->id) }}" class="dropdown-item text-right"><i class="fa fa-window-close"></i> باطل کردن سفارش</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </section>

        </section>
    </section>
</section>

@endsection
