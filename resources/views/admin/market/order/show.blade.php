@extends('admin.layouts.master')

@section('head-tag')
<title>نمایش فاکتور سفارش </title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#"> خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#"> بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#"> سفارشات</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> فاکتور سفارش </li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
             فاکتور سفارش
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-3 ">
                <a href="{{ route('admin.market.order.all') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

           

            
            <section class="table-responsive">
                <table class="table table-striped table-hover" id="printable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                 
                        

                        <tr class="table-primary">
                            <th>{{ $order->id }}</th>
                            <td class="width-8rem text-left">
                                <a href="" class="btn btn-dark btn-sm text-white" id="print">
                                    <i class="fa fa-print"></i>
                                    چاپ
                                </a>
                                <a href="{{ route('admin.market.order.details' , $order->id) }}" class="btn btn-warning btn-sm text-dark">
                                    <i class="fa fa-book"></i>
                                    جزئیات 
                                </a>
                                    
                            </td>
                        </tr>


                        <tr class="border-bottm">
                            <th>نام مشتری</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->user->fullname ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>آدرس</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->address->address ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>نام استان</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->address->city->province->name ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>نام شهر</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->address->city->name ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>کد پستی</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->address->postal_code ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>پلاک</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->address->no ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>واحد</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->address->unit ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>نام گیرند</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->address->recipient_first_name ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>نام خانوادگی گیرند</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->address->recipient_last_name ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>شماره موبایل</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->address->mobile ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>نوع پرداخت</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->payment_type_value ?? 'ندارد'}}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>وضعیت پرداخت</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->payment_status_value ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>مبلغ ارسال</th>
                            <td class="text-left font-weight-bolder">{{ $order->delivery_amount ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>وضعیت ارسال</th>
                            {{ $order->delivery_status_value ?? 'ندارد'}}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>تاریخ ارسال</th>
                            <td class="text-left font-weight-bolder">
                                {{ jalaliDate($order->delivery_date) ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>(بدون تخفیف) مبلغ سفارش</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->order_final_amount.' تومان' ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>مبلغ تمامی تخفیف ها</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->order_discount_amount.' تومان' ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>مبلغ تخفیف تمام محصولات</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->order_total_products_discount_amount.' تومان' ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>مبلغ نهایی پرداخت شده</th>
                            <td class="text-left font-weight-bolder">
                                
                            @php
                                $final_paid_amount = number_format(($order->order_final_amount - $order->order_discount_amount), 3, '.', '');
                            @endphp

                                {{ $final_paid_amount.' تومان' ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>بانک</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->payment->paymentable->gateway ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>کوپن استفاده شده</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->copan->code ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>تخفیف گرفته شده از کوپن تخفیف</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->order_copan_discount_amount.' تومان' ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>تخفیف عمومی استفاده شده</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->commonDiscount->title ?? 'ندارد' }}
                            </td>
                        </tr>

                        <tr class="border-bottm">
                            <th>تخفیف گرفته شده از تخفیف عمومی</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->common_discount_amount.' تومان' ?? 'ندارد' }}
                        </tr>

                        <tr class="border-bottm">
                            <th>وضعیت سفارش</th>
                            <td class="text-left font-weight-bolder">
                                {{ $order->status_value ?? 'ندارد' }}
                            </td>

                        </tr>




                    </tbody>
                </table>
            </section>

        </section>
    </section>
</section>

@endsection


@section('script')

<script>

    var printBtn = document.getElementById('print');

    printBtn.addEventListener('click', function(){
        printContent('printable');
    });

    function printContent(el)
    {
        var restorePage = $('body').html();
        var printContent = $('#' + el).clone();

        $('body').empty().html(printContent);
        window.print();
        $('body').html(restorePage);


    }

</script>
    
@endsection