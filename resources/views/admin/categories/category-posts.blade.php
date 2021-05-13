@extends('admin.layouts.app')
@section('content')
    <div class="content-body">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Category - Posts</h4>
                        <a href="#newpost" class="btn btn-primary waves-effect waves-float waves-light">New Post</a>
                    </div>
                    @include('admin.layouts.posts-table')
                    @include('admin.layouts.pagination')
                </div>
            </div>
        </div>
    </div>
@endsection
