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
@section('title','')

@section('breadcrumb')
    <x-admin.breadcrumb :breadcrumbs="$breadcrumbs"/>
@endsection

@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('Deleted Users')}}</h4>
                    </div>
                    <div class="table-responsive">
                        <x-admin.users-table :users="$users" type="deleted"/>
                    </div>
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
                    title: '{{ Session::get('status') }}',
                    showConfirmButton: false,
                    timer: 3000,
                });
            })
        </script>
    @endif
@endsection
