@extends('admin.layouts.app')
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/vendors/css/forms/select/select2.min.css") }}">
@endsection
@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Category - Posts</h4>
                        <a href="#newpost" class="btn btn-primary waves-effect waves-float waves-light">New Post</a>
                    </div>
                    @include('admin.layouts.category-table')
                    @include('admin.layouts.pagination')
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">New Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('req') }}" class="form">
                            <div class="row">
                                <div class="col-sm-2 col-12">
                                    <div class="form-group mb-2">
                                        <div class="custom-control custom-switch custom-switch-success">
                                            <p class="mb-50">Status</p>
                                            <input type="checkbox" class="custom-control-input" id="status" name="status" checked/>
                                            <label class="custom-control-label" for="status">
                                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                                <span class="switch-icon-right"><i data-feather="x"></i></span> </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-10 col-12">
                                    <div class="form-group mb-2">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Category Name">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-2">
                                        <label for="payment-expiry">Category Color</label>
                                        <div class="demo-inline-spacing">
                                            <div class="custom-control custom-control-primary custom-radio">
                                                <input type="radio" id="r1" name="color" class="custom-control-input" value="primary" checked>
                                                <label class="custom-control-label" for="r1">
                                                    <div class="badge-wrapper mr-1">
                                                        <div class="badge badge-pill badge-primary">
                                                            <i data-feather='check-circle'></i></div>
                                                    </div>
                                                </label>

                                            </div>
                                            <div class="custom-control custom-control-success custom-radio">
                                                <input type="radio" id="r2" name="color" class="custom-control-input" value="success">
                                                <label class="custom-control-label" for="r2">
                                                    <div class="badge-wrapper mr-1">
                                                        <div class="badge badge-pill badge-success">
                                                            <i data-feather='check-circle'></i></div>
                                                    </div>
                                                </label>

                                            </div>
                                            <div class="custom-control custom-control-info custom-radio">
                                                <input type="radio" id="r3" name="color" class="custom-control-input" value="info">
                                                <label class="custom-control-label" for="r3">
                                                    <div class="badge-wrapper mr-1">
                                                        <div class="badge badge-pill badge-info">
                                                            <i data-feather='check-circle'></i></div>
                                                    </div>
                                                </label>

                                            </div>
                                            <div class="custom-control custom-control-warning custom-radio">
                                                <input type="radio" id="r4" name="color" class="custom-control-input" value="warning">
                                                <label class="custom-control-label" for="r4">
                                                    <div class="badge-wrapper mr-1">
                                                        <div class="badge badge-pill badge-warning">
                                                            <i data-feather='check-circle'></i></div>
                                                    </div>
                                                </label>

                                            </div>
                                            <div class="custom-control custom-control-danger custom-radio">
                                                <input type="radio" id="r5" name="color" class="custom-control-input" value="danger">
                                                <label class="custom-control-label" for="r5">
                                                    <div class="badge-wrapper mr-1">
                                                        <div class="badge badge-pill badge-danger">
                                                            <i data-feather='check-circle'></i></div>
                                                    </div>
                                                </label>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-1">
                                    <label>Parent Category</label>
                                    <select name="parent" class="select2 form-control form-control-lg">
                                        <option value="main">main</option>
                                        <option value="sort">sort</option>
                                        <option value="news">news</option>
                                        <option value="game">game</option>
                                        <option value="tech">tech</option>
                                    </select>

                                </div>
                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary btn-block waves-float waves-light" VALUE="Create">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('vendor-script')
    <script src="{{ asset('assets/admin/vendors/js/forms/select/select2.full.min.js') }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset('assets/admin/js/scripts/forms/form-select2.js') }}"></script>
@endsection
