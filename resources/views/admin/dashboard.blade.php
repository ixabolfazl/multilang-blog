@extends('admin.layouts.app')
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/vendors/css/charts/apexcharts.css") }}">
@endsection
@section('page-style-rtl')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-rtl/plugins/charts/chart-apex.css") }}">
@endsection
@section('page-style-ltr')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-ltr/plugins/charts/chart-apex.css") }}">
@endsection
@section('content')
    <div class="content-body">

        <div class="row match-height">
            @include('admin.layouts.Statistics')
        </div>
        <section id="apexchart">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex flex-sm-row flex-column justify-content-md-between align-items-start justify-content-start">
                            <div>
                                <h4 class="card-title mb-25">Last Month Views</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div id="line-chart"></div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card text-center mb-3">
                    <div class="card-header">
                        <ul class="nav nav-tabs card-header-tabs ml-0" id="nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="recentposts-tab" data-toggle="tab" href="#recentposts" role="tab" aria-controls="home" aria-selected="true">Recent Posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="topposts-tab" data-toggle="tab" href="#topposts" role="tab" aria-controls="profile" aria-selected="false">Top Posts</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="mostviewpost-tab" data-toggle="tab" href="#mostviewpost" role="tab" aria-controls="profile" aria-selected="false">Most View Post</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="recentposts" role="tabpanel" aria-labelledby="recentposts-tab">
                                @include('admin.layouts.posts-table')
                            </div>
                            <div class="tab-pane fade" id="topposts" role="tabpanel" aria-labelledby="topposts-tab">
                                <div class="table-responsive">
                                    @include('admin.layouts.posts-table')
                                </div>
                            </div>
                            <div class="tab-pane fade" id="mostviewpost" role="tabpanel" aria-labelledby="mostviewpost-tab">
                                <div class="table-responsive">
                                    @include('admin.layouts.posts-table')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
@section('vendor-script')
    <script src="{{ asset('assets/admin/vendors/js/charts/apexcharts.min.js') }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset('assets/admin/js/scripts/charts/chart-apex.js') }}"></script>
@endsection
