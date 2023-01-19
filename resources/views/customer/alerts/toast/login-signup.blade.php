
    <section class="position-fixed p-4 flex-row-reverse " style="z-index: 9; right: 0; top: 1.5rem; width:26rem; max-width:80%;">

        <div class="toast" data-delay="7000" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
              <div class="rounded me-2" style="background: red"></div>
              <strong class="me-auto">فروشگاه ستاره شمال</strong>
              <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                برای افزودن کالا به لیست علاقه مندی ها باید وارد حساب کاربری خود شوید
                <br>

                <a href="{{ route('auth.customer.login-register-form') }}" class="text-dark">
                    ثبت نام / ورود
                </a>
            </div>
          </div>

    </section>