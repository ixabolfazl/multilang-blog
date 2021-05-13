@extends('admin.layouts.app')
@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-lg-12 col-12 order-1 order-lg-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-start align-items-center mb-1">
                            <!-- avatar -->
                            <div class="avatar mr-1">
                                <img src="{{ asset('assets/admin/images/portrait/small/avatar-s-1.jpg') }}" alt="avatar img" height="50" width="50"/>
                            </div>
                            <!--/ avatar -->
                            <div class="col-lg-10 col-12">
                                <div class="profile-user-info">
                                    <h6 class="mb-0">Leeanna Alvord</h6>
                                    <small class="text-muted">12 Dec 2018 at 1:16 AM</small>
                                </div>
                            </div>
                            <div class="col-lg-2 col-12">
                                <div class="align-items-center">
                                    <a href="app-email.html" data-toggle="tooltip" data-placement="top" title="Enable"><span class="badge badge-pill badge-success"><i data-feather='check'></i></span></a>
                                    <a href="app-email.html" data-toggle="tooltip" data-placement="top" title="Disable"><span class="badge badge-pill badge-warning"><i data-feather='eye-off'></i></span></a>
                                    <a href="app-email.html" data-toggle="tooltip" data-placement="top" title="Edit"><span class="badge badge-pill badge-secondary"><i data-feather="edit"></i></span></a>
                                    <a href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Delete"><span class="badge badge-pill badge-danger"><i data-feather="trash-2"></i></span></a>
                                </div>
                            </div>

                        </div>
                        <p class="card-text">
                            Wonderful Machine· A well-written bio allows viewers to get to know a photographer beyond the work. This can make the difference when presenting to clients who are looking for the perfect fit. </p>
                        <hr>
                        <div class="d-flex align-items-start mb-1">
                            <div class="avatar mt-25 mr-75">
                                <img src="{{ asset('assets/admin/images/portrait/small/avatar-s-19.jpg') }}" alt="Avatar" height="34" width="34"/>
                            </div>
                            <div class="profile-user-info w-100">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h6 class="mb-0">Kitty Allanson</h6>
                                </div>

                                <small>Wonderful Machine· A well-written bio allows viewers to get to know a photographer beyond the work. This can make the difference when presenting to clients who are looking for the perfect fit.</small>
                            </div>
                            <div class="col-lg-2 col-12">
                                <div class="align-items-center">
                                    <a href="app-email.html" data-toggle="tooltip" data-placement="top" title="Enable"><span class="badge badge-pill badge-success"><i data-feather='check'></i></span></a>
                                    <a href="app-email.html" data-toggle="tooltip" data-placement="top" title="Disable"><span class="badge badge-pill badge-warning"><i data-feather='eye-off'></i></span></a>
                                    <a href="app-email.html" data-toggle="tooltip" data-placement="top" title="Edit"><span class="badge badge-pill badge-secondary"><i data-feather="edit"></i></span></a>
                                    <a href="app-todo.html" data-toggle="tooltip" data-placement="top" title="Delete"><span class="badge badge-pill badge-danger"><i data-feather="trash-2"></i></span></a>
                                </div>
                            </div>
                        </div>


                        <form action="">
                            <fieldset class="form-label-group mb-75">
                                <textarea class="form-control" id="textarea" name="comment" rows="3" placeholder="Add Replay"></textarea>
                                <label for="textarea">Replay Comment</label>
                            </fieldset>
                            <input type="submit" class="btn btn-sm btn-primary" value="Replay">
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
