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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">{{__('Comments')}}</h4>
                        <ul class="nav nav-pills" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center @if(!isset(request()->approved)) active @endif" href="{{ route('admin.comments.index') }}">
                                    <i data-feather='message-square'></i><span class="d-none d-sm-block">{{__('All Comments')}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center @if(request()->approved=='1') active @endif" href="{{ route('admin.comments.index',['approved'=>1]) }}">
                                    <i data-feather='message-square'></i><span class="d-none d-sm-block">{{__('Approved Comments')}}</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link d-flex align-items-center @if(request()->approved=='0') active @endif" href="{{ route('admin.comments.index',['approved'=>0]) }}">
                                    <i data-feather='message-square'></i><span class="d-none d-sm-block">{{__('Not approved Comments')}}</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('Comment')}}</th>
                                <th>{{__('For')}}</th>
                                <th>{{__('User')}}</th>
                                <th>{{__('Status')}}</th>
                                <th>{{__('Date')}}</th>
                                <th>{{__('Replies')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ Str::limit($comment->comment, 50) }}</td>
                                    <td>
                                        <a href="{{ route('admin.posts.edit',$comment->post->id)}}">{{ Str::limit($comment->post->title, 50) }}</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.edit',$comment->user->id)}}">{{ $comment->user->name }}</a>
                                    </td>
                                    <td>
                                        <span class="badge badge-pill badge-{{ $comment->is_approved ? 'success' : 'danger'}} mr-1">{{ __($comment->is_approved ? 'Approved' : 'Not approved') }}</span>
                                    </td>
                                    <td>{{ $comment->date }}</td>
                                    <td>
                                        {{ $comment->replies_count }}
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.comments.destroy',$comment->id) }}" id="destroy-comment-{{$comment->id}}" method="post">
                                            <a href="{{ route('admin.comments.show',$comment->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('View & Reply') }}"><span class="badge badge-pill badge-info"><i data-feather='message-square'></i></span></a>
                                            <a href="{{ route('admin.comments.status',$comment->id) }}" data-toggle="tooltip" data-placement="top" title="{{__($comment->is_approved ? 'Unapprove' :'Approve')}}"><span class="badge badge-pill badge-{{$comment->is_approved?'warning':'success'}}"><i data-feather='{{$comment->is_approved?'eye-off':'check'}}'></i></span></a>
                                            <a href="{{ route('admin.comments.edit',$comment->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('Edit') }}"><span class="badge badge-pill badge-secondary"><i data-feather="edit"></i></span></a>
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('admin.comments.destroy',$comment->id) }}" onclick="destroyComment({{ $comment->id }})" data-toggle="tooltip" data-placement="top" title="{{ __('Delete') }}"><span class="badge badge-pill badge-danger"><i data-feather="trash-2"></i></span></a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
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
