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
        <div class="row">
            <div class="col-lg-12 col-12 order-1 order-lg-2">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-start align-items-center mb-1">
                            @if(is_null($comment->user->image))
                                <div class="avatar bg-{{ ['primary','danger','warning','success','info','secondary'][$comment->user->id%6] }}">
                                    <div class="avatar-content">{{ substr($comment->user->email,0,2) }}</div>
                                </div>
                            @else
                                <div class="avatar mr-1">
                                    <img src="{{ asset($comment->user->image) }}" alt="avatar" width="50" height="50">
                                </div>
                            @endif
                            <div class="col-lg-10 col-12">
                                <div class="profile-user-info">
                                    <h6 class="mb-0">{{ $comment->user->name }}</h6>
                                    <small class="text-muted">{{ $comment->date  }}</small>
                                </div>
                            </div>
                            <div class="col-lg-2 col-12">
                                <div class="align-items-center">
                                    <form action="{{ route('admin.comments.destroy',$comment->id) }}" id="destroy-comment-{{$comment->id}}" method="post">
                                        <a href="{{ route('admin.comments.status',$comment->id) }}" data-toggle="tooltip" data-placement="top" title="{{__($comment->is_approved ? 'Unapprove' :'Approve')}}"><span class="badge badge-pill badge-{{$comment->is_approved?'warning':'success'}}"><i data-feather='{{$comment->is_approved?'eye-off':'check'}}'></i></span></a>
                                        <a href="{{ route('admin.comments.edit',$comment->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('Edit') }}"><span class="badge badge-pill badge-secondary"><i data-feather="edit"></i></span></a>
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('admin.comments.destroy',$comment->id) }}" onclick="destroyComment({{ $comment->id }})" data-toggle="tooltip" data-placement="top" title="{{ __('Delete') }}"><span class="badge badge-pill badge-danger"><i data-feather="trash-2"></i></span></a>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <p class="card-text">{{ $comment->comment }} </p>
                        <hr>
                        <form action="{{ route('admin.comments.store',$comment->id) }}" method="post">
                            @csrf
                            <x-admin.textarea name="comment" :label="__('Replay')" tabindex="1" rows="3"/>
                            <input type="submit" class="btn btn-sm btn-primary" value="{{ __('Replay') }}">
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
        function destroyComment(id) {
            event.preventDefault();
            Swal.fire({
                title: '{{ __('Are you sure?')}}',
                text: '{{__('You wont be able to revert this!')}}',
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
                    document.getElementById(`destroy-comment-${id}`).submit();
                }
            });
        }
    </script>
@endsection
