@extends('admin.layouts.app')@section('title',__(array_key_last($breadcrumbs)))
@section('breadcrumb')
    <x-admin.breadcrumb :breadcrumbs="$breadcrumbs"/>
@endsection
@section('content')
    <div class="content-body">
        <div class="row">
            <div class="col-lg-12 col-12 order-1 order-lg-2">
                <div class="card">
                    <div class="card-body">
                        <div class="employee-task d-flex justify-content-between align-items-center  mb-1">
                            <div class="media">
                                <div class="avatar mr-75">
                                    <img src="{{ asset($comment->post->image) }}" class="rounded" width="50" height="50" alt="Avatar">
                                </div>
                                <div class="media-body my-auto">
                                    <h5 class="mb-0">
                                        <a href="{{ route('admin.posts.edit',$comment->post->id) }}">{{ $comment->post->title }}</a>
                                    </h5>
                                    <small>{{ Str::limit($comment->post->description, 100) }}</small>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-start align-items-center mb-1">
                            @if(is_null($comment->user->image))
                                <div class="avatar bg-{{ ['primary','danger','warning','success','info','secondary'][$comment->user->id%6] }}">
                                    <div class="avatar-content">{{ substr($comment->user->email,0,2) }}</div>
                                </div>
                            @else
                                <div class="avatar mr-1">
                                    <img src="{{ asset($comment->user->image) }}" alt="avatar" width="42" height="42">
                                </div>
                            @endif
                            <div class="col-lg-12 col-12">
                                <div class="profile-user-info">
                                    <h6 class="mb-0">{{ $comment->user->name }}</h6>
                                    <small class="text-muted">{{ $comment->date  }}</small>
                                </div>
                            </div>
                        </div>
                        <form action="{{ route('admin.comments.update',$comment->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <x-admin.textarea name="comment" tabindex="1" rows="3" value="{{ $comment->comment }}"/>
                            <input type="submit" class="btn btn-sm btn-primary" value="{{ __('Update') }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

