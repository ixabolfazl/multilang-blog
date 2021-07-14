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
