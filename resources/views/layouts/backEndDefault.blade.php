<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>AMS</title>
    <!-- plugins:css -->
    @include('layouts.partials.backend.style')
    @yield('css')
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    @include('layouts.partials.backend.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        @include('layouts.partials.backend.theme_setting')

        @include('layouts.partials.backend.right_sidebar')
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        @include('layouts.partials.backend.side_bar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('content')
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
{{--            <footer class="footer">--}}
{{--                <div class="d-sm-flex justify-content-center justify-content-sm-between">--}}
{{--                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>--}}
{{--                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>--}}
{{--                </div>--}}
{{--            </footer>--}}
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

@include('layouts.partials.backend.script')
@yield('js')
</body>

</html>

