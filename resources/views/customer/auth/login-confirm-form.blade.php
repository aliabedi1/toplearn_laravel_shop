@extends('customer.layouts.master-simple')


@section('content')





<section class="vh-100 d-flex justify-content-center align-items-center pb-5">
    <form action="{{ route('auth.customer.login-confirm', $token) }}" method="POST">
        @csrf
        <section class="login-wrapper mb-5">
            <section class="login-logo">
                <img src="{{ asset('customer-assets/images/logo/4.png') }}" alt="">
            </section>


            <section class="login-title mb-2">
                <a href="{{ route('auth.customer.login-register-form') }}">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </section>
            <section class="login-title mb-2">
                کد تایید را وارد نمایید
            </section>
            <section class="login-info">
                @if ($otp->type == 0)
                    کد تایید برای شماره موبایل {{ $otp->login_id }} ارسال گردید
                @elseif ($otp->type == 1)
                    کد تایید برای ایمیل {{ $otp->login_id }} ارسال گردید
                @endif
            </section>
            <section class="login-input-text my-3">
                <input class="my-3" type="text" name="id" value="{{ old('id') }}" >
                
                @error('id')
                <span class="alert_required bg-danger text-white p-1 font-weight-lighter rounded " role="alert">
                    <small>
                        {{ $message }}
                    </small>
                </span>
                @enderror
            </section>

            <section class="login-btn d-grid g-2"><button class="btn btn-danger">تایید</button></section>
        </section> 
    </form>
</section>






@endsection