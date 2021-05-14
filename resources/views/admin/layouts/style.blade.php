<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet"><!-- BEGIN: Vendor CSS-->
@if(app()->getLocale()=='fa')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/vendors/css/vendors-rtl.min.css") }}">
@else
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/vendors/css/vendors.min.css") }}">
@endif
@yield('vendor-style')
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
@if(app()->getLocale()=='fa')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-rtl/bootstrap.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-rtl/bootstrap-extended.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-rtl/colors.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-rtl/components.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-rtl/themes/dark-layout.min.css") }}">
@else
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-ltr/bootstrap.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-ltr/bootstrap-extended.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-ltr/colors.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-ltr/components.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-ltr/themes/dark-layout.min.css") }}">
@endif
<!-- BEGIN: Page CSS-->
@if(app()->getLocale()=='fa')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-rtl/core/menu/menu-types/vertical-menu.css") }}">
    @yield('page-style-rtl')
@else
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-ltr/core/menu/menu-types/vertical-menu.css") }}">
    @yield('page-style-ltr')
@endif
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
@if(app()->getLocale()=='fa')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-rtl/custom-rtl.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-ltr/style-rtl.min.css") }}">
@else
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-ltr/style.css") }}">
@endif
<!-- END: Custom CSS-->
