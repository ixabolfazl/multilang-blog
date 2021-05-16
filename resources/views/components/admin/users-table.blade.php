<table class="table table-hover">
    <thead>
    <tr>
        <th>ID</th>
        <th></th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <th>
                @if(empty($user->image))
                    <div class="avatar bg-{{ ['primary','danger','warning','success','info','secondary'][rand(0,5)] }}">
                        <div class="avatar-content">{{ substr($user->email,0,2) }}</div>
                    </div>
                @else
                    <div class="avatar">
                        <img src="{{ asset($user->image) }}" alt="avatar" width="32" height="32">
                    </div>
                @endif

            </th>
            <td><a href="{{ route('admin.users.show',$user->id) }}">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>
                <a href="#"><span class="badge badge-pill badge-{{ $user->role == 'admin' || $user->role == 'author' ? 'primary' : 'secondary' }}">{{ $user->role }}</span></a>
            </td>
            <td>
                <span class="badge badge-pill badge-{{ $user->status=='enable' ? 'success' : 'danger'}} mr-1">{{ $user->status }}</span>
            </td>
            <td>
                <form action="{{ route($type=='users'?'admin.users.destroy' : 'admin.users.delete',$user->id) }}" method="post">
                    @if($type=='users')
                        @if($user->status=='enable')
                            <a href="{{ route('admin.users.status',$user->id) }}" data-toggle="tooltip" data-placement="top" title="Disable"><span class="badge badge-pill badge-warning"><i data-feather='eye-off'></i></span></a>
                        @else
                            <a href="{{ route('admin.users.status',$user->id) }}" data-toggle="tooltip" data-placement="top" title="Enable"><span class="badge badge-pill badge-success"><i data-feather='check'></i></span></a>
                        @endif
                        <a href="{{ route('admin.users.edit',$user->id) }}" data-toggle="tooltip" data-placement="top" title="Edit"><span class="badge badge-pill badge-secondary"><i data-feather="edit"></i></span></a>
                        <a href="{{ route('admin.users.show',$user->id) }}" data-toggle="tooltip" data-placement="top" title="View"><span class="badge badge-pill badge-info"><i data-feather='external-link'></i></span></a>
                    @else
                        <a href="{{ route('admin.users.restore',$user->id) }}" data-toggle="tooltip" data-placement="top" title="Restore"><span class="badge badge-pill badge-success"><i data-feather='check'></i></span></a>
                    @endif
                    @csrf
                    @method('DELETE')
                    <a href="{{ route($type=='users'?'admin.users.destroy' : 'admin.users.delete',$user->id) }}" onclick="event.preventDefault();this.closest('form').submit()" data-toggle="tooltip" data-placement="top" title="Delete"><span class="badge badge-pill badge-danger"><i data-feather="trash-2"></i></span></a>
                </form>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
