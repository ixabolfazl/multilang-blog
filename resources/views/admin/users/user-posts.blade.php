@extends('admin.layouts.app')
@section('page-style-rtl')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-rtl/pages/app-user.css") }}">
@endsection
@section('page-style-ltr')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-ltr/pages/app-user.css") }}">
@endsection
@section('content')
    <div class="content-body">

        @include('admin.layouts.user-header-view')

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Posts</h4>
                        <a href="#newpost" class="btn btn-primary waves-effect waves-float waves-light">New Post</a>
                    </div>
                    @include('admin.layouts.posts-table')
                    @include('admin.layouts.pagination')
                </div>
            </div>
        </div>
    </div>
@endsection

