<!DOCTYPE html>


<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="{{ $lang }}">
<!-- BEGIN: Head-->
<head>
    @include('panel.layouts.meta')
    <link rel="apple-touch-icon" href="{{ asset('assets/panel/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/panel/images/ico/favicon.ico') }}">
    @include('auth.layouts.style')

</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="blank-page">
<!-- BEGIN: Content-->
@yield('content')
<!-- END: Content-->
@include('auth.layouts.script')
</body>
<!-- END: Body-->

</html>
