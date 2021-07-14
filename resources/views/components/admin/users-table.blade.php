<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>{{__('ID')}}</th>
            <th></th>
            <th>{{__('Full Name')}}</th>
            <th>{{__('Email')}}</th>
            <th>{{__('Phone Number')}}</th>
            <th>{{__('Registery date')}}</th>
            <th>{{__('Role')}}</th>
            <th>{{__('Status')}}</th>
            <th>{{__('Actions')}}</th>
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
                <td>
                    @if($user->role == 'Admin' || $user->role=="Author")
                        <a href="{{ route('admin.users.show',$user->id) }}">{{ $user->name }}</a>
                    @else
                        {{ $user->name }}
                    @endif

                </td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{  (app()->getLocale() == 'fa' ? Verta::instance($user->created_at) : $user->created_at)->format('Y/m/d') }}</td>
                <td>
                    <span class="badge badge-pill badge-{{ $user->role != 'User' ? 'primary' : 'secondary' }}">{{ __($user->role) }}</span>
                </td>
                <td>
                    <span class="badge badge-pill badge-{{ $user->status=='Enable' ? 'success' : 'danger'}} mr-1">{{ __($user->status) }}</span>
                </td>
                <td>
                    <form action="{{ route($type=='users'?'admin.users.destroy' : 'admin.users.delete',$user->id) }}" id="destroy-user-{{$user->id}}" method="post">
                        @if($type=='users')
                            @if($user->status=='Enable')
                                <a href="{{ route('admin.users.status',$user->id) }}" data-toggle="tooltip" data-placement="top" title="{{__('Disable')}}"><span class="badge badge-pill badge-warning"><i data-feather='eye-off'></i></span></a>
                            @else
                                <a href="{{ route('admin.users.status',$user->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('Enable') }}"><span class="badge badge-pill badge-success"><i data-feather='check'></i></span></a>
                            @endif
                            <a href="{{ route('admin.users.edit',$user->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('Edit') }}"><span class="badge badge-pill badge-secondary"><i data-feather="edit"></i></span></a>
                        @else
                            <a href="{{ route('admin.users.restore',$user->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('Restore') }}"><span class="badge badge-pill badge-success"><i data-feather='check'></i></span></a>
                        @endif
                        @csrf
                        @method('DELETE')
                        @if($user->role != 'User')
                            <a href="{{ route('admin.users.show',$user->id) }}" data-toggle="tooltip" data-placement="top" title="{{ __('View') }}"><span class="badge badge-pill badge-info"><i data-feather='external-link'></i></span></a>
                        @else
                            <a href="{{ route($type=='users'?'admin.users.destroy' : 'admin.users.delete',$user->id) }}" onclick="destroyUser({{ $user->id }})" data-toggle="tooltip" data-placement="top" title="{{ __('Delete') }}"><span class="badge badge-pill badge-danger"><i data-feather="trash-2"></i></span></a>
                        @endif
                    </form>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
