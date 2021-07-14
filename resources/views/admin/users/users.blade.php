@extends('admin.layouts.app')
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/vendors/css/extensions/sweetalert2.min.css") }}">
@endsection
@section('page-style-rtl')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-rtl/plugins/extensions/ext-component-sweet-alerts.css") }}">
@endsection
@section('page-style-ltr')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-ltr/plugins/extensions/ext-component-sweet-alerts.css") }}">
@endsection
@section('title',__(array_key_last($breadcrumbs)))
@section('breadcrumb')
    <x-admin.breadcrumb :breadcrumbs="$breadcrumbs"/>
@endsection
@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('Users')}}</h4>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary waves-effect waves-float waves-light">{{__('New User')}}</a>
                    </div>

                    <x-admin.users-table :users="$users"/>

                    {{ $users->links('admin.layouts.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('vendor-script')
    <script src="{{ asset('assets/admin/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset('assets/admin/js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script>
    @if(Session::has('status'))
        <script>
            $(window).on('load', function () {
                Swal.fire({
                    icon: 'success',
                    title: '{{__('Success')}}',
                    text: '{{ Session::get('status') }}',
                    showConfirmButton: false,
                    timer: 3000,
                });
            })
        </script>
    @endif
    <script>
        function destroyUser(id) {
            event.preventDefault();
            Swal.fire({
                title: '{{ __('Are you sure?')}}',
                text: '{{__('You can restore it later!')}}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{ __('Yes, delete it!')}}',
                cancelButtonText: '{{ __('Cancel')}}',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    document.getElementById(`destroy-user-${id}`).submit();
                }
            });
        }
    </script>
@endsection
