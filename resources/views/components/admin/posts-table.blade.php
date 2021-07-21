<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>{{__('Image')}}</th>
            <th>{{__('Title')}}</th>
            <th>{{__('Description')}}</th>
            <th>{{__('Category')}}</th>
            <th>{{__('Author')}}</th>
            <th>{{__('Date')}}</th>
            <th>{{__('Status')}}</th>
            <th>{{__('Views')}}</th>
            <th>{{__('Actions')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>
                    <div class="avatar"><img src="{{ asset($post->image) }}" alt="avatar" width="32" height="32"></div>
                </td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>
                    @foreach($post->categories as $category)
                        <a href="{{ route('admin.categories.show',$category->id) }}">
                            <span class="badge badge-pill badge-{{ ['primary','danger','warning','success','info','secondary'][$category->id%6] }}">{{ $category->name }}</span>
                        </a>
                    @endforeach
                </td>
                <td><a href="{{ route('admin.users.show',$post->user->id) }}">{{ $post->author }}</a></td>

                <td>{{  $post->date }}</td>
                <td>
                    <span class="badge badge-pill badge-{{ $post->status=='Enable' ? 'success' : 'danger'}} mr-1">{{ __($post->status) }}</span>
                </td>
                <td>
                    {{ $post->view }}
                </td>
                <td>
                    <form action="{{ route($type=='posts'?'admin.posts.destroy' : 'admin.posts.delete',$post->id) }}" id="destroy-post-{{$post->id}}" method="post">
                        @if($type=='posts')
                            @if($post->status=='Enable')
                                <a href="{{ route('admin.posts.status',$post->id) }}" data-toggle="tooltip" data-placement="top" title="{{__('Disable')}}"><span class="badge badge-pill badge-warning"><i data-feather='eye-off'></i></span></a>
                            @else
                                <a href="{{ route('admin.posts.status',$post->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('Enable') }}"><span class="badge badge-pill badge-success"><i data-feather='check'></i></span></a>
                            @endif
                            <a href="{{ route('admin.posts.edit',$post->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('Edit') }}"><span class="badge badge-pill badge-secondary"><i data-feather="edit"></i></span></a>
                            <a href="{{ route('admin.posts.show',$post->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('View') }}"><span class="badge badge-pill badge-info"><i data-feather='external-link'></i></span></a>
                            <a href="{{ route('admin.posts.comments',$post->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('Comments') }}"><span class="badge badge-pill badge-primary"><i data-feather='message-square'></i></span></a>
                        @else
                            <a href="{{ route('admin.posts.restore',$post->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('Restore') }}"><span class="badge badge-pill badge-success"><i data-feather='check'></i></span></a>
                        @endif
                        @csrf
                        @method('DELETE')
                        <a href="{{ route($type=='posts'?'admin.posts.destroy' : 'admin.posts.delete',$post->id) }}" onclick="destroyPost({{ $post->id }})" data-toggle="tooltip" data-placement="top" title="{{ __('Delete') }}"><span class="badge badge-pill badge-danger"><i data-feather="trash-2"></i></span></a>
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
