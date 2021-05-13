@extends('admin.layouts.app')
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/admin/vendors/css/forms/select/select2.min.css") }}">
@endsection
@section('content')
    <div class="content-body">
        <div class="row match-height">
            <div class="col-xl-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit Post</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('req') }}" method="post" class="form">
                            <div class="row">
                                <div class="col-1">
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
                                <div class="col-5 mb-1">
                                    <div class="form-group mb-2">
                                        <label for="category">Category</label>
                                        <select name="category[]" class="select2 form-control" multiple>
                                            <option value="1">sport</option>
                                            <option value="2">tech</option>
                                            <option value="3">laptop</option>
                                            <option value="4">ddfghdfh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6 mb-1">
                                    <div class="form-group">
                                        <label for="image">Image</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="image">Choose Image</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="fa-tab" data-toggle="tab" href="#fa" aria-controls="home" role="tab" aria-selected="true">Fa<img style="padding: 10px" src="{{ asset('assets/app/img/flag/ir.png')  }}" alt="fa"></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="en-tab" data-toggle="tab" href="#en" aria-controls="profile" role="tab" aria-selected="false"> En
                                        <img style="padding: 10px" src="{{ asset('assets/app/img/flag/us.png')  }}" alt="fa"></a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="fa" aria-labelledby="fa-tab" role="tabpanel">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6 mb-1">
                                            <div class="form-group">
                                                <label for="name">Title</label>
                                                <input type="text" id="name" name="title" class="form-control" placeholder="Menu Name">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-1">
                                            <div class="form-group mb-2">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-1">
                                            <div class="form-group">
                                                <label for="image">Tags</label>
                                                <input type="text" id="tags" name="tags" class="form-control" placeholder="Tags1,Tag2,...">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <div class="form-group mb-2">
                                                <label for="description">Text</label>
                                                <textarea class="form-control editor" id="description" name="body"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-1">
                                            <div class="divider">
                                                <div class="divider-text">Seo</div>
                                            </div>
                                        </div>

                                        <div class="col-6 mb-1">
                                            <div class="form-group">
                                                <label for="meta">Meta Description (100 until 160 character)</label>
                                                <textarea id="meta" name="meta" class="form-control char-textarea" placeholder="Meta Description" cols="30" rows="2"></textarea>
                                                <small class="textarea-counter-value float-right"><span class="char-count">0</span> / 160
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-1">
                                            <div class="form-group">
                                                <label for="image">Keywords</label>
                                                <input type="text" id="keywords" name="tags" class="form-control" placeholder="Keywords1,Keywords2,...">
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <input type="submit" class="btn btn-primary waves-float waves-light" value="Create">
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="en" aria-labelledby="en-tab" role="tabpanel">
                                    @csrf
                                    <div class="row">
                                        <div class="col-6 mb-1">
                                            <div class="form-group">
                                                <label for="name">Title</label>
                                                <input type="text" id="name" name="title" class="form-control" placeholder="Menu Name">
                                            </div>
                                        </div>
                                        <div class="col-6 mb-1">
                                            <div class="form-group mb-2">
                                                <label for="description">Description</label>
                                                <textarea class="form-control" id="description" name="description" rows="2"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-1">
                                            <div class="form-group">
                                                <label for="image">Tags</label>
                                                <input type="text" id="tags" name="tags" class="form-control" placeholder="Tags1,Tag2,...">
                                            </div>
                                        </div>
                                        <div class="col-12 mb-1">
                                            <div class="form-group mb-2">
                                                <label for="description">Text</label>
                                                <textarea class="form-control editor" id="description" name="body"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-12 mb-1">
                                            <div class="divider">
                                                <div class="divider-text">Seo</div>
                                            </div>
                                        </div>

                                        <div class="col-6 mb-1">
                                            <div class="form-group">
                                                <label for="meta">Meta Description (100 until 160 character)</label>
                                                <textarea id="meta" name="meta" class="form-control char-textarea" placeholder="Meta Description" cols="30" rows="2"></textarea>
                                                <small class="textarea-counter-value float-right"><span class="char-count">0</span> / 160
                                                </small>
                                            </div>
                                        </div>
                                        <div class="col-6 mb-1">
                                            <div class="form-group">
                                                <label for="image">Keywords</label>
                                                <input type="text" id="keywords" name="tags" class="form-control" placeholder="Keywords1,Keywords2,...">
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <input type="submit" class="btn btn-primary waves-float waves-light" value="Create">
                                        </div>
                                    </div>
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
        ClassicEditor
            .create(document.querySelector('.editor'), {
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'fontSize',
                        'fontBackgroundColor',
                        'fontColor',
                        'highlight',
                        'fontFamily',
                        'bold',
                        'italic',
                        'underline',
                        'link',
                        'alignment',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'outdent',
                        'indent',
                        '|',
                        'imageUpload',
                        'imageInsert',
                        'blockQuote',
                        'insertTable',
                        'removeFormat',
                        'undo',
                        'redo'
                    ]
                },
                language: '{{ app()->getLocale() }}',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:full',
                        'imageStyle:side'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                },
                licenseKey: '',


            })
            .then(editor => {
                window.editor = editor;
            })
    </script>
@endsection
