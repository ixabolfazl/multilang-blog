<!DOCTYPE html>


<html class="loading" lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-textdirection="{{ app()->getLocale()=='fa'?'rtl':'ltr' }}">
<!-- BEGIN: Head-->
<head>
    @include('admin.layouts.meta')
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

@include('admin.layouts.navbar')

@include('admin.layouts.sidebar')

<!-- BEGIN: Content-->
<div class="app-content content ">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">

            @yield('breadcrumb')

        </div>

        @yield('content')

    </div>
</div>
<!-- END: Content-->
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

@include('admin.layouts.footer')
@include('admin.layouts.script')

</body>
<!-- END: Body-->

</html>
