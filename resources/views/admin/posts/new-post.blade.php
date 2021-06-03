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
        <div class="row match-height">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('New Post')}}</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.posts.store') }}" method="post" class="form" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-1">
                                    <x-admin.checkbox-status name="status" :label="__('Status')" tabindex="1"/>
                                </div>
                                <div class="col-6 mb-1">
                                    <x-admin.input name="slug" :label="__('Slug')" tabindex="2"/>
                                </div>
                                <div class="col-6 mb-1">
                                    <x-admin.input name="image" :label="__('Image')" :placeholder="__('Choose Image')" type="file" tabindex="3"/>
                                </div>
                                <div class="col-6 mb-1">
                                    <div class="form-group mb-2">
                                        <label for="category">{{__('Category')}}</label>
                                        <select name="category[]" class="select2 form-control" multiple tabindex="4">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
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
                                            <div class="col-6 mb-1">
                                                <x-admin.input name="{{$local}}[title]" :label="__('Title')" tabindex="5" :local="$local"/>
                                            </div>
                                            <div class="col-6 mb-1">
                                                <x-admin.textarea name="{{$local}}[description]" :label="__('Description').' '.__('(:first until :second character)',['first'=> 100,'second'=>200])" tabindex="6" rows="2" :local="$local"/>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <x-admin.textarea name="{{$local}}[body]" :label="__('Text')" tabindex="7" rows="10" type="editor" :local="$local"/>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <div class="divider">
                                                    <div class="divider-text">{{__('Seo')}}</div>
                                                </div>
                                            </div>
                                            <div class="col-6 mb-1">
                                                <x-admin.textarea name="{{$local}}[meta]" :label="__('Meta Description').' '.__('(:first until :second character)',['first'=> 100,'second'=>160])" tabindex="8" rows="2" :local="$local"/>
                                            </div>
                                            <div class="col-6 mb-1">
                                                <x-admin.input name="{{$local}}[keywords]" :label="__('Keywords')" tabindex="9" :local="$local"/>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary waves-float waves-light" value="Create">
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
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        var allEditors = document.querySelectorAll('.editor');
        for (var i = 0; i < allEditors.length; ++i) {
            ClassicEditor.create(allEditors[i],
                {
                    toolbar: {
                        items: ['heading', '|', 'fontSize', 'fontBackgroundColor', 'fontColor', 'highlight', 'fontFamily', 'bold', 'italic', 'underline', 'link', 'alignment',
                            'bulletedList', 'numberedList', '|', 'outdent', 'indent', '|', 'imageUpload', 'imageInsert', 'blockQuote', 'insertTable', 'removeFormat', 'undo', 'redo']
                    },
                    language: '{{ app()->getLocale() }}',
                    image: {toolbar: ['imageTextAlternative', 'imageStyle:full', 'imageStyle:side', 'linkImage']},
                    table: {contentToolbar: ['tableColumn', 'tableRow', 'mergeTableCells']},
                });
        }
    </script>
@endsection
