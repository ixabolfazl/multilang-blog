@extends('admin.layouts.app')
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/vendors/css/extensions/sweetalert2.min.css") }}">
@endsection
@section('page-style-rtl')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-rtl/plugins/extensions/ext-component-sweet-alerts.css") }}">
@endsection
@section('page-style-ltr')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/css-ltr/plugins/extensions/ext-component-sweet-alerts.css") }}">
@endsection
@section('title',__(array_key_last($breadcrumbs)))
@section('breadcrumb')
    <x-admin.breadcrumb :breadcrumbs="$breadcrumbs"/>
@endsection
@section('content')
    <div class="content-body">
        <div class="row match-height">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('Setting')}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.setting.update') }}" method="post" class="form" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <ul class="nav nav-tabs" role="tablist">
                                @foreach(config('translatable.locales') as $local)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $loop->index!=0 ?: 'active' }}" id="{{$local}}-tab" data-toggle="tab" href="#{{$local}}" aria-controls="home" role="tab" aria-selected="{{ $loop->index==0 ? 'true' : 'false' }}">{{ ucfirst(__($local)) }}
                                            <img style="padding: 10px" src="{{ asset("assets/app/img/flag/$local.png")  }}" alt="{{ $local }}"></a>
                                    </li>
                                @endforeach
                            </ul>
                            <div class="tab-content">
                                @foreach(config('translatable.locales') as $local)
                                    <div class="tab-pane {{ $loop->index!=0 ?: 'active' }}" id="{{$local}}" aria-labelledby="{{$local}}-tab" role="tabpanel">
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="col-12 mb-1">
                                                    <x-admin.input name="{{$local}}[site_name]" :label="__('Title')" tabindex="5" :local="$local" :value="$setting[$local]->site_name"/>
                                                </div>
                                                <div class="col-12 mb-1">
                                                    <x-admin.textarea name="{{$local}}[description]" :label="__('Description').' '.__('(:first until :second character)',['first'=> 100,'second'=>200])" tabindex="6" rows="2" :local="$local" :value="$setting[$local]->description"/>
                                                </div>
                                                <div class="col-12 mb-1">
                                                    <x-admin.textarea name="{{$local}}[about]" :label="__('About')" tabindex="6" rows="2" :local="$local" :value="$setting[$local]->about"/>
                                                </div>
                                                <div class="col-12 mb-1">
                                                    <div class="row">

                                                        <div class="col-6 mb-1">
                                                            <x-admin.input name="{{$local}}[logo_url]" :label="__('Logo')" :placeholder="__('Choose Image')" type="file" tabindex="3"/>
                                                        </div>
                                                        <div class="col-6 mb-1">
                                                            <img class="img-fluid rounded" src="{{ asset($setting[$local]->logo_url) }}" height="104" alt="logo"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 mb-1 ">
                                                    <label for="category">{{__('Category')}}</label>
                                                    <select name="{{$local}}[breaking_title_category]" class="select form-control" tabindex="4">
                                                        @foreach($categories as $category)
                                                            <option @if($setting[$local]->breaking_title_category == $category->id) selected @endif value="{{$category->id}}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error($local.'.breaking_title_category')
                                                    <div class="alert alert-danger mt-1">
                                                        <div class="alert-body"><span>{{ $message }}</span></div>
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-6 mb-1">
                                                    <x-admin.input name="{{$local}}[phone_number]" :label="__('Phone Number')" tabindex="2" :value="$setting[$local]->phone_number"/>
                                                </div>
                                                <div class="col-6 mb-1">
                                                    <x-admin.input name="{{$local}}[email]" :label="__('Email')" tabindex="5" :local="$local" :value="$setting[$local]->email"/>
                                                </div>
                                                <div class="col-12 mb-1">
                                                    <x-admin.textarea name="{{$local}}[address]" :label="__('Address')" tabindex="6" rows="2" :local="$local" :value="$setting[$local]->address"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary waves-float waves-light" value="{{__('Update')}}">
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
    <script src="{{ asset('assets/admin/vendors/js/extensions/sweetalert2.all.min.js') }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset('assets/admin/js/scripts/extensions/ext-component-sweet-alerts.js') }}"></script>
    @if(Session::has('status'))
        <script>
            $(window).on('load', function () {
                Swal.fire({
                    icon: 'success',
                    title: '{{ Session::get('status') }}',
                    showConfirmButton: false,
                    timer: 3000,
                });
            })
        </script>
    @endif
@endsection

