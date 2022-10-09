<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('build')}}/assets/admin/assets/css/popup.css">
    <link rel="stylesheet" href="{{asset('build')}}/assets/admin/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{asset('build')}}/assets/admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('build')}}/assets/admin/assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="{{asset('build')}}/assets/admin/assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('build')}}/assets/admin/assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('build')}}/assets/admin/assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('build')}}/assets/admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('build')}}/assets/admin/assets/images/favicon.png" />
</head>
<body>
<div class="container-scroller">
    @include('admin._sidebar')
    <div class="container-fluid page-body-wrapper">
        @include('admin._headbar')
            <div class="main-panel">
                <div class="content-wrapper">
                    @section('content')
                    @show
                </div>
                @include('admin._footer')
            </div>
    </div>
</div>
@include('admin._js')

<script src="{{asset('build')}}/assets/admin/assets/js/popup.js"></script>
<script src="{{asset('build')}}/assets/admin/assets/js/jquery-3.6.0.min.js"></script>
</body>
</html>
