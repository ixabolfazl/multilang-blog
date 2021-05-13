@extends('admin.layouts.app')
@section('page-style-rtl')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-rtl/pages/app-user.css") }}">
@endsection
@section('page-style-ltr')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-ltr/pages/app-user.css") }}">
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/vendors/css/forms/select/select2.min.css") }}">
@endsection
@section('content')
    @include('admin.layouts.user-header-view')
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit User</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" placeholder="Name" name="name" id="name"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" placeholder="Email" name="email" id="email"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" placeholder="Phone" name="phone" id="phone"/>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="status">Status</label> <select class="form-control" id="status">
                                        <option>Active</option>
                                        <option>Deactivated</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="role">Role</label> <select class="form-control" id="role">
                                        <option>Admin</option>
                                        <option>User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose Image</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-12">
                                <h4 class="mb-1">
                                    <i data-feather="user" class="font-medium-4 mr-25"></i>
                                    <span class="align-middle">Personal Information</span>
                                </h4>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label for="birth">Birth date</label>
                                    <input id="birth" type="text" class="form-control birthdate-picker" name="birth" placeholder="2010/10/22"/>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input id="website" type="text" class="form-control" placeholder="Website" name="website"/>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label for="lang">Languages</label>
                                    <select id="lang" name="lang" class="form-control">
                                        <option value="English">English</option>
                                        <option value="Persian" selected>Persian</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label class="d-block mb-1">Gender</label>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="male" name="gender" class="custom-control-input" value="male"/>
                                        <label class="custom-control-label" for="male">Male</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="female" name="gender" class="custom-control-input" value="female" checked/>
                                        <label class="custom-control-label" for="female">Female</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <h4 class="mb-1 mt-2">
                                    <i data-feather="map-pin" class="font-medium-4 mr-25"></i>
                                    <span class="align-middle">Address</span>
                                </h4>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group mb-2">
                                    <label for="country">Country</label>
                                    <select id="country" name="country" class="select2 form-control">
                                        <option value="1" selected>Iran</option>
                                        <option value="2">USA</option>
                                        <option value="3">Germany</option>
                                        <option value="4">France</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input id="city" type="text" class="form-control" placeholder="City" name="city"/>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label for="address-1">Address</label>
                                    <input id="address-1" type="text" class="form-control" placeholder="Address" name="address"/>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="form-group">
                                    <label for="postcode">Postcode</label>
                                    <input id="postcode" type="text" class="form-control" placeholder="Postcode" name="zip"/>
                                </div>
                            </div>
                            <div class="col-12">
                                <h4 class="mb-1 mt-2">
                                    <i data-feather="share-2" class="font-medium-4 mr-25"></i>
                                    <span class="align-middle">Social</span>
                                </h4>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                                <label for="slack-input">Telegram</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon11">
                                                            <i data-feather="send" class="font-medium-2"></i>
                                                        </span>
                                    </div>
                                    <input id="slack-input" type="text" class="form-control" placeholder="https://t.me/..." aria-describedby="basic-addon11"/>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                                <label for="instagram-input">Instagram</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon5">
                                                            <i data-feather="instagram" class="font-medium-2"></i>
                                                        </span>
                                    </div>
                                    <input id="instagram-input" type="text" class="form-control" placeholder="https://www.instagram.com/..." aria-describedby="basic-addon5"/>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                                <label for="twitter-input">Twitter</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon3">
                                                            <i data-feather="twitter" class="font-medium-2"></i>
                                                        </span>
                                    </div>
                                    <input id="twitter-input" type="text" class="form-control" placeholder="https://www.twitter.com/..." aria-describedby="basic-addon3"/>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                                <label for="facebook-input">Facebook</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon4">
                                                            <i data-feather="facebook" class="font-medium-2"></i>
                                                        </span>
                                    </div>
                                    <input id="facebook-input" type="text" class="form-control" placeholder="https://www.facebook.com/..." aria-describedby="basic-addon4"/>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                                <label for="github-input">Github</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon9">
                                                            <i data-feather="github" class="font-medium-2"></i>
                                                        </span>
                                    </div>
                                    <input id="github-input" type="text" class="form-control" placeholder="https://www.github.com/..." aria-describedby="basic-addon9"/>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 form-group">
                                <label for="codepen-input">Linkedin</label>
                                <div class="input-group input-group-merge">
                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon12">
                                                            <i data-feather="linkedin" class="font-medium-2"></i>
                                                        </span>
                                    </div>
                                    <input id="codepen-input" type="text" class="form-control" placeholder="https://www.linkedin.com/..." aria-describedby="basic-addon12"/>
                                </div>
                            </div>
                            <div class="col-12 d-flex flex-sm-row flex-column mt-2">
                                <input type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1" value="Create">
                            </div>
                        </div>
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
