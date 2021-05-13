@extends('admin.layouts.app')
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/vendors/css/forms/select/select2.min.css") }}">
@endsection
@section('content')
    <div class="content-body">

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Menu</h4>
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
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Menu Name">
                                    </div>
                                </div>
                                <div class="col-12 mb-1">
                                    <div class="form-group mb-2">
                                        <label for="name">link</label>
                                        <input type="text" id="link" name="link" class="form-control" placeholder="Menu Link">
                                    </div>
                                </div>
                                <div class="col-12 mb-1">
                                    <label>Menu Type</label> <select name="type" class="form-control form-control-lg">
                                        <option value="main">main</option>
                                        <option value="sort">munu2</option>
                                    </select>

                                </div>
                                <div class="col-12 mb-1">
                                    <label>Parent Menu</label>
                                    <select name="parent" class="select2 form-control form-control-lg">
                                        <option value="main">main</option>
                                        <option value="sort">sort</option>
                                        <option value="news">news</option>
                                        <option value="game">game</option>
                                        <option value="tech">tech</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary btn-block waves-float waves-light" value="Update">
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
