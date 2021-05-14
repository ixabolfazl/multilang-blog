<!-- BEGIN: Vendor JS-->
<script src="{{ asset('assets/admin/vendors/js/vendors.min.js') }}"></script><!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->@yield('vendor-script')
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="{{ asset('assets/admin/js/core/app-menu.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/core/app.min.js') }}"></script><!-- END: Theme JS-->

<!-- BEGIN: Page JS-->@yield('page-script')
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
