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
@section('title',__('Users')." - ".array_key_last($breadcrumbs))
@section('breadcrumb')
    <x-admin.breadcrumb :breadcrumbs="$breadcrumbs"/>
@endsection
@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('Posts')}}</h4>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.categories.show',$category->id) }}">
                            <div class="row">
                                <div class="col-9">
                                    <div class="form-group">
                                        <x-admin.input name="search" placeholder="{{ __('Search') }}" value="{{ request()->search ? request()->search : null }}" tabindex="1"/>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="row">
                                        <button type="submit" class="btn btn-icon rounded-circle btn-outline-primary waves-effect">
                                            <i data-feather='search'></i></button>
                                        @if(request()->has('search') and request()->search !="")
                                            <a href="{{ route('admin.categories.show',$category->id) }}">
                                                <div class="btn btn-icon rounded-circle btn-primary waves-effect ">
                                                    <i data-feather='x'></i></div>
                                            </a>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                    <x-admin.posts-table :posts="$posts"/>
                    {{ $posts->appends(request()->query())->links('admin.layouts.pagination') }}
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
        function destroyPost(id) {
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
                    document.getElementById(`destroy-post-${id}`).submit();
                }
            });
        }
    </script>
@endsection
