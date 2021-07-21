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
@section('title',__(array_key_last($breadcrumbs)))
@section('breadcrumb')
    <x-admin.breadcrumb :breadcrumbs="$breadcrumbs"/>
@endsection
@section('content')
    <div class="content-body">
        <div class="row match-height">
            <div class="col-xl-12 col-md-6 col-12">
                <div class="card card-statistics">
                    <div class="card-header">
                        <h4 class="card-title">{{__('Statistics')}}</h4>
                    </div>
                    <div class="card-body statistics-body">
                        <div class="row">
                            <div class="col-xl col-sm-6 col-12 mb-2 mb-xl-0">
                                <a href="{{ route('admin.posts.index') }}">
                                    <div class="media">
                                        <div class="avatar bg-light-primary mr-2">
                                            <div class="avatar-content">
                                                <i data-feather="file-text" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{ $posts_count }}</h4>
                                            <p class="card-text text-dark font-small-3 mb-0">{{__('Posts')}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xl col-sm-6 col-12 mb-2 mb-xl-0">
                                <div class="media">
                                    <div class="avatar bg-light-info mr-2">
                                        <div class="avatar-content">
                                            <i data-feather="eye" class="avatar-icon"></i>
                                        </div>
                                    </div>
                                    <div class="media-body my-auto">
                                        <h4 class="font-weight-bolder mb-0">1200k</h4>
                                        <p class="card-text text-dark font-small-3 mb-0">{{__('Views')}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl col-sm-6 col-12 mb-2 mb-xl-0">
                                <a href="{{ route('admin.comments.index') }}">
                                    <div class="media">
                                        <div class="avatar bg-light-danger mr-2">
                                            <div class="avatar-content">
                                                <i data-feather="message-square" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{ $comments_count }}</h4>
                                            <p class="card-text text-dark font-small-3 mb-0">{{__('Comments')}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            @can('viewAny', App\Models\User::class)
                                <div class="col-xl col-sm-6 col-12 mb-2 mb-xl-0">
                                    <a href="{{ route('admin.users.index') }}">
                                        <div class="media">
                                            <div class="avatar bg-light-warning mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="users" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{ $users_count }}</h4>
                                                <p class="card-text text-dark font-small-3 mb-0">{{__('Users')}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endcan
                            @can('viewAny', App\Models\Category::class)
                                <div class="col-xl col-sm-6 col-12 mb-2 mb-sm-0">
                                    <a href="{{ route('admin.categories.index') }}">
                                        <div class="media">
                                            <div class="avatar bg-light-success mr-2">
                                                <div class="avatar-content">
                                                    <i data-feather="layers" class="avatar-icon"></i>
                                                </div>
                                            </div>
                                            <div class="media-body my-auto">
                                                <h4 class="font-weight-bolder mb-0">{{ $category_count }}</h4>
                                                <p class="card-text text-dark font-small-3 mb-0">{{__('Categories')}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endcan
                            <div class="col-xl col-sm-6 col-12 mb-2 mb-sm-0">
                                <a href="{{ route('admin.posts.trash') }}">
                                    <div class="media">
                                        <div class="avatar bg-light-secondary mr-2">
                                            <div class="avatar-content">
                                                <i data-feather="trash" class="avatar-icon"></i>
                                            </div>
                                        </div>
                                        <div class="media-body my-auto">
                                            <h4 class="font-weight-bolder mb-0">{{$deleted_posts_count}}</h4>
                                            <p class="card-text text-dark font-small-3 mb-0">{{__('Deleted Posts')}}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('Last Posts')}}</h4>
                    </div>
                    <div class="table-responsive">
                        <x-admin.posts-table :posts="$posts"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="row match-height">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('Last Comments')}}</h4>
                    </div>
                    <div class="table-responsive">
                        <x-admin.comments-table :comments="$comments"/>
                    </div>
                </div>
            </div>
        </div>
        @can('viewAny', App\Models\User::class)
            <div class="row match-height">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">{{__('Last Users')}}</h4>
                        </div>
                        <x-admin.users-table :users="$users"/>
                    </div>
                </div>
            </div>
        @endcan

    </div>
@endsection
@section('vendor-script')
    <script src="{{ asset('assets/admin/vendors/js/charts/apexcharts.min.js') }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset('assets/admin/js/scripts/charts/chart-apex.js') }}"></script>
@endsection
