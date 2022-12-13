<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.head-tag')
    @yield('head-tag')

</head>

<body dir="rtl">

    @include('admin.layouts.header')



    <section class="body-container">

        @include('admin.layouts.sidebar')


        <section id="main-body" class="main-body">

            @yield('content')

        </section>
    </section>


    @include('admin.layouts.script')
    @yield('script')


    <section class="toast-wrapper flex-row-reverse">
        @include('admin.alerts.toast.error')
        @include('admin.alerts.toast.success')
    </section>

    @include('admin.alerts.sweetalert.success')
    @include('admin.alerts.sweetalert.error')

</body>
</html>
