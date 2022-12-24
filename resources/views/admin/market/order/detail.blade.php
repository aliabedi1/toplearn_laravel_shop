@extends('admin.layouts.master')

@section('head-tag')
<title>جزئیات سفارش</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> جزئیات سفارش</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                جزئیات سفارش {{ $order->id }}
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
                            <th>درصد فروش فوق العاده</th>
                            <th>مبلغ فروش فوق العاده</th>
                            <th>تعداد</th>
                            <th>جمع قیمت محصول</th>
                            <th>مبلغ نهایی</th>
                            <th>رنگ</th>
                            <th>گارانتی</th>
                            <th>ویژگی</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->orderItems as $item )
                            
                            <tr>
                                <th><div class="py-3">{{ $loop->iteration }}</div></th>

                                <td><div class="py-3">{{ $item->singleProduct->name ?? 'ندارد' }}</div> </td>

                                <td><div class="py-3">{{ $item->amazingSale->percent.'%' ?? 'ندارد' }}</div> </td>

                                <td><div class="py-3">{{ $item->amazing_sale_discount_amount.' تومان' ?? 'ندارد' }} </div> </td>

                                <td><div class="py-3">{{ $item->number ?? 'ندارد' }}</div> </td>
{{-- 
                                @php
                                $final_paid_amount = number_format(($order->order_final_amount - $order->order_discount_amount), 3, '.', '');
                                @endphp --}}

                                <td><div class="py-3">{{ $item->final_product_price.' تومان' ?? 'ندارد' }} </div></td>

                                <td><div class="py-3">{{ $item->final_total_price.' تومان' ?? 'ندارد' }} </div></td>

                                <td><div class="py-3">{{ $item->color->color_name ?? 'ندارد' }}</div> </td>
                                
                                <td><div class="py-3">{{ $item->guarantee->name ?? 'ندارد' }}</div> </td>
                                
                                <td>
                                    <div class="py-3">

                                        @forelse ($item->orderItemAttributes as $attribute)
                                            {{ ($attribute->categoryAttribute->name ?? 'ندارد') . ' : ' .(json_decode($attribute->categoryAttributeValue->value)->value ?? 'ندارد') }}
                                        @empty
                                            ندارد
                                        @endforelse

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
