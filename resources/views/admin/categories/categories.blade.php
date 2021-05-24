@extends('admin.layouts.app')
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/vendors/css/forms/select/select2.min.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/vendors/css/extensions/sweetalert2.min.css") }}">
@endsection
@section('page-style-rtl')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-rtl/plugins/extensions/ext-component-sweet-alerts.css") }}">
@endsection
@section('page-style-ltr')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-ltr/plugins/extensions/ext-component-sweet-alerts.css") }}">
@endsection
@section('title','')

@section('breadcrumb')
    <x-admin.breadcrumb :breadcrumbs="$breadcrumbs"/>
@endsection
@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('Categories')}}</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{__('ID')}}</th>
                                <th>{{__('Category Name')}}</th>
                                <th>{{__('Parent')}}</th>
                                <th>{{__('Posts')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>
                                        <a href="{{ route('admin.categories.show',$category->name) }}">{{ $category->name }}</a>
                                    </td>
                                    <td>
                                        @if($category->category_id)
                                            <a href="{{ route('admin.categories.show',$category->category_id) }}">{{ $category->category_id }}</a>
                                        @else
                                            {{__('No parent')}}
                                        @endif
                                    </td>
                                    <td>
                                        200
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-{{ $category->status=='Enable' ? 'success' : 'danger'}} mr-1">{{ __($category->status) }}</span>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.categories.destroy' ,$category->id) }}" id="destroy-category-{{$category->id}}" method="post">
                                            @if($category->status=='Enable')
                                                <a href="{{ route('admin.categories.status',$category->id) }}" data-toggle="tooltip" data-placement="top" title="{{__('Disable')}}"><span class="badge badge-pill badge-warning"><i data-feather='eye-off'></i></span></a>
                                            @else
                                                <a href="{{ route('admin.categories.status',$category->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('Enable') }}"><span class="badge badge-pill badge-success"><i data-feather='check'></i></span></a>
                                            @endif
                                            <a href="{{ route('admin.categories.edit',$category->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('Edit') }}"><span class="badge badge-pill badge-secondary"><i data-feather="edit"></i></span></a>
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('admin.categories.show',$category->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('View') }}"><span class="badge badge-pill badge-info"><i data-feather='external-link'></i></span></a>
                                            <a href="{{ route('admin.categories.destroy',$category->id) }}" onclick="destroyCategory({{ $category->id }})" data-toggle="tooltip" data-placement="top" title="{{ __('Delete') }}"><span class="badge badge-pill badge-danger"><i data-feather="trash-2"></i></span></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $categories->links('admin.layouts.pagination') }}
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('New Category')}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.categories.store') }}" method="post" class="form">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12 col-12">
                                    <div class="form-group mb-2">
                                        <div class="custom-control custom-switch custom-switch-success">
                                            <p class="mb-50">{{__('Status')}}</p>
                                            <input type="hidden" name="status" value="Disable">
                                            <input type="checkbox" class="custom-control-input" id="status" name="status" value="Enable" checked/>
                                            <label class="custom-control-label" for="status">
                                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                                <span class="switch-icon-right"><i data-feather="x"></i></span> </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-12">
                                    <x-admin.input name="name" :label="__('Category Name')" tabindex="1"/>
                                </div>
                                <div class="col-12 mb-1">
                                    <label>{{__('Parent Category')}}</label>
                                    <select name="category_id" class="select2 form-control form-control-lg">
                                        <option value="" tabindex="2" selected>{{__('No parent')}}</option>
                                        @foreach($parents as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary waves-float waves-light" VALUE="{{__('Create')}}">
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
    <script src="{{ asset('assets/admin/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset('assets/admin/js/scripts/forms/form-select2.js') }}"></script>
    <script src="{{ asset('assets/admin/js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script>
    @if(Session::has('status'))
        <script>
            $(window).on('load', function () {
                Swal.fire({
                    icon: 'success',
                    title: '{{__('Success')}}',
                    text: '{{ Session::get('status') }}',
                    showConfirmButton: false,
                    timer: 3000,
                });
            })
        </script>
    @endif
    <script>
        function destroyCategory(id) {
            event.preventDefault();
            Swal.fire({
                title: '{{ __('Are you sure?')}}',
                text: '{{__('You won\'t be able to revert this!')}}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: '{{ __('Yes, delete it!')}}',
                cancelButtonText: '{{ __('Cancel')}}',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false
            }).then(function (result) {
                if (result.value) {
                    document.getElementById(`destroy-category-${id}`).submit();
                }
            });
        }
    </script>
@endsection
