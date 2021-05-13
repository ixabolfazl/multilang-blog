@extends('admin.layouts.app')
@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Deleted Posts</h4>
                    </div>
                    @include('admin.layouts.posts-table')
                    @include('admin.layouts.pagination')
                </div>
            </div>
        </div>

    </div>
@endsection
