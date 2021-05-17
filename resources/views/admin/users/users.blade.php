@extends('admin.layouts.app')

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
                        <h4 class="card-title">Users</h4>
                        <a href="{{ route('admin.users.create') }}" class="btn btn-primary waves-effect waves-float waves-light">New User</a>
                    </div>
                    <div class="table-responsive">
                        <x-admin.users-table :users="$users"/>
                    </div>
                    {{ $users->links('admin.layouts.pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection
