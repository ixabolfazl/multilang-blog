@extends('admin.layouts.app')
@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Users</h4>
                        <a href="#newUser" class="btn btn-primary waves-effect waves-float waves-light">New User</a>
                    </div>
                    @include('admin.layouts.users-table')
                    @include('admin.layouts.pagination')
                </div>
            </div>
        </div>
    </div>
@endsection
