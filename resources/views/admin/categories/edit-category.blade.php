@extends('admin.layouts.app')
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/vendors/css/forms/select/select2.min.css") }}">
@endsection
@section('title',__(array_key_last($breadcrumbs)))
@section('breadcrumb')
    <x-admin.breadcrumb :breadcrumbs="$breadcrumbs"/>
@endsection
@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('New Category')}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.categories.update',$category->id) }}" method="post" class="form">
                            @csrf
                            @method('PUT')
                            <div class="col-12 mb-1">
                                <x-admin.checkbox-status name="status" :label="__('Status')" :checked="$category->status" tabindex="1"/>
                            </div>
                            <div class="col-12 mb-1">
                                <x-admin.input name="slug" :label="__('Slug')" tabindex="2" :value="$category->slug"/>
                            </div>
                            <div class="col12">
                                <ul class="nav nav-tabs" role="tablist">
                                    @foreach(config('translatable.locales') as $local)
                                        <li class="nav-item">
                                            <a class="nav-link {{ $loop->index!=0 ?: 'active' }}" id="{{$local}}-tab" data-toggle="tab" href="#{{$local}}" aria-controls="home" role="tab" aria-selected="{{ $loop->index==0 ? 'true' : 'false' }}">{{ ucfirst(__($local)) }}
                                                <img style="padding: 10px" src="{{ asset("assets/app/img/flag/$local.png")  }}" alt="fa"></a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content">
                                    @foreach(config('translatable.locales') as $local)
                                        <div class="tab-pane {{ $loop->index!=0 ?: 'active' }}" id="{{$local}}" aria-labelledby="{{$local}}-tab" role="tabpanel">
                                            <div class="col-10 mb-1">
                                                <x-admin.input name="{{$local}}[name]" :label="__('Category Name')" value="{{ isset($category->translate($local)->name) ? $category->translate($local)->name : null }}" tabindex="3"/>
                                            </div>
                                            <div class="col-10 mb-1">
                                                <x-admin.input name="{{$local}}[meta]" :label="__('Meta')" :placeholder="__('Meta Description')" value="{{ isset($category->translate($local)->meta) ? $category->translate($local)->meta : null }}" tabindex="4"/>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-12 mb-1">
                                <div class="form-group">
                                    <label>{{__('Parent Category')}}</label>
                                    <select name="category_id" class="select2 form-control form-control-lg">
                                        <option value="" tabindex="5" selected>{{__('No parent')}}</option>
                                        @foreach($parents as $parent)
                                            <option {{ $category->category_id == $parent->id ? 'selected': '' }} value="{{ $parent->id }}">{{ $parent->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-1">
                                <input type="submit" class="btn btn-primary waves-float waves-light" VALUE="{{__('Update')}}">
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
