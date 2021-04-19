<!DOCTYPE html>

@if(app()->getLocale()=='fa')
    @php $lang='rtl' @endphp
@else
    @php $lang='ltr' @endphp
@endif

<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="{{ $lang }}">
<!-- BEGIN: Head-->

<head>

    @include('panel.layouts.meta')
    <link rel="apple-touch-icon" href="{{ asset('assets/panel/images/ico/apple-icon-120.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/panel/images/ico/favicon.ico') }}">


    @include('panel.layouts.style')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click"
      data-menu="vertical-menu-modern" data-col="">

@include('panel.layouts.navbar')

@include('panel.layouts.sidebar')

@yield('content')

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@include('panel.layouts.footer')


@include('panel.layouts.script')
</body>
<!-- END: Body-->

</html>
