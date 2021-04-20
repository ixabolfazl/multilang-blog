<!-- BEGIN: Vendor JS-->
<script src="{{ asset('assets/panel/vendors/js/vendors.min.js') }}"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset('assets/panel/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
@yield('vendor-script')
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('assets/panel/js/core/app-menu.min.js') }}"></script>
<script src="{{ asset('assets/panel/js/core/app.min.js') }}"></script>
<!-- END: Theme JS-->

<!-- BEGIN: Page JS-->
@yield('page-script')
<!-- END: Page JS-->

<script>
    $(window).on('load', function () {
        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })
</script>
