<!DOCTYPE html>
<html lang="en">
<head>
    @include('customer.layouts.head-tag')
    @yield('head-tag')
</head>
<body>


    <!-- start main one col -->
    <main id="main-body-one-col" class="main-body">


        @yield('content')


    </main>
    <!-- end main one col -->




    @include('customer.layouts.script')
    @yield('script')
</body>

</html>