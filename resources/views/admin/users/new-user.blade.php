@extends('admin.layouts.app')
@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">New User</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                            <div class="row">
                                @csrf
                                <div class="col-md-4">
                                    <x-admin.input name="name" label="Name" tabindex="1"/>
                                </div>
                                <div class="col-md-4">
                                    <x-admin.input name="email" label="Email" tabindex="2"/>
                                </div>
                                <div class="col-md-4">
                                    <x-admin.input name="phone" label="Phone" tabindex="3"/>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="enable">Enable</option>
                                            <option value="disable">Disable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <select name="role" id="role" class="form-control">
                                            <option>User</option>
                                            <option>Author</option>
                                            <option>Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <x-admin.input name="image" label="Image" placeholder="Choose Image" type="file" tabindex="4"/>
                                </div>
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <x-admin.input name="password" label="Password" type="password" tabindex="4"/>
                                        </div>
                                        <div class="col-md-4">
                                            <x-admin.input name="password_confirmation" label="Password Confirmation" type="password" tabindex="5"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                    <input type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1" value="Create">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
