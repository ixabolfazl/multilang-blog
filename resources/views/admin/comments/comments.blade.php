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
                        <h4 class="card-title">{{__('Comments')}}</h4>
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center @if(!isset(request()->approved)) active @endif" href="{{ route('admin.comments.index') }}">
                                    <i data-feather='message-square'></i><span class="d-none d-sm-block">{{__('All Comments')}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center @if(request()->approved=='1') active @endif" href="{{ route('admin.comments.index',['approved'=>1]) }}">
                                    <i data-feather='message-square'></i><span class="d-none d-sm-block">{{__('Approved Comments')}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center @if(request()->approved=='0') active @endif" href="{{ route('admin.comments.index',['approved'=>0]) }}">
                                    <i data-feather='message-square'></i><span class="d-none d-sm-block">{{__('Not approved Comments')}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <x-admin.comments-table :comments="$comments"/>
                    {{ $comments->appends(request()->query())->links('admin.layouts.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('vendor-script')
    <script src="{{ asset('assets/admin/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
@endsection
@section('page-script')
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
        function destroyComment(id) {
            event.preventDefault();
            Swal.fire({
                title: '{{ __('Are you sure?')}}',
                text: '{{__('You wont be able to revert this!')}}',
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
                    document.getElementById(`destroy-comment-${id}`).submit();
                }
            });
        }
    </script>
@endsection
