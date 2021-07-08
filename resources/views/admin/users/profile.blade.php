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
                    <div class="card-body user-card">
                        @if($user->image)
                            <div class="row">
                                <div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg m-2">
                                    <div class="user-avatar-section">
                                        <div class="d-flex justify-content-start">
                                            <img class="img-fluid rounded" src="{{ asset($user->image) }}" height="104" width="104" alt="User avatar">
                                            <div class="d-flex flex-column ml-1">
                                                <div class="user-info mb-1">
                                                    <h4 class="mb-0">{{ $user->name }}</h4>
                                                    <span class="card-text">{{ $user->email }}</span>
                                                </div>
                                                <div class="d-flex flex-wrap">
                                                    <a href="{{ route('admin.users.removeImage',$user->id) }}" class="btn btn-outline-danger ml-1 waves-effect">{{__('Delete Image')}}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endif
                        <div class="row">
                            <form class="m-2" action="{{ route('admin.profile.update',$user->id) }}" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-4">
                                        <x-admin.input name="name" :label="__('Full Name')" tabindex="1" :value="$user->name"/>
                                    </div>
                                    <div class="col-md-4">
                                        <x-admin.input name="email" :label="__('Email')" tabindex="2" :value="$user->email" disabled="true"/>
                                    </div>
                                    <div class="col-md-4">
                                        <x-admin.input name="phone" :label="__('Phone Number')" tabindex="3" :value="$user->phone"/>
                                    </div>
                                    <div class="col-md-4">
                                        <x-admin.input name="image" :label="__('Image')" :placeholder="__('Choose Image')" type="file" tabindex="4"/>
                                    </div>
                                    <div class="col-md-4">
                                        <x-admin.input name="password" :label="__('Password')" type="password" tabindex="5"/>
                                    </div>
                                    <div class="col-md-4">
                                        <x-admin.input name="password_confirmation" :label="__('Password Confirmation')" type="password" tabindex="6"/>
                                    </div>
                                    <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                        <input type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1" value="{{__('Update')}}">
                                    </div>
                                </div>
                            </form>

                        </div>


                    </div>
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

