<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
      rel="stylesheet">

<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset("assets/panel/vendors/css/vendors.min.css") }}">
<!-- END: Vendor CSS-->

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="{{ asset("assets/panel/css-$lang/bootstrap.min.css") }}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/panel/css-$lang/bootstrap-extended.min.css") }}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/panel/css-$lang/colors.min.css") }}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/panel/css-$lang/components.min.css") }}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/panel/css-$lang/themes/dark-layout.min.css") }}">

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css"
      href="{{ asset("assets/panel/css-$lang/core/menu/menu-types/vertical-menu.css") }}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/panel/css-$lang/plugins/forms/form-validation.css") }}">
<link rel="stylesheet" type="text/css" href="{{ asset("assets/panel/css-$lang/pages/page-auth.css") }}">
@yield('page-style')
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
@if($lang=="rtl")
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/panel/css-rtl/custom-rtl.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/panel/css-ltr/style-rtl.min.css") }}">
@else
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/panel/css-ltr/style.css") }}">
@endif

<!-- END: Custom CSS-->
