<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item">
                    <a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a>
                </li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item dropdown dropdown-language">
                    <a class="nav-link dropdown-toggle" id="dropdown-flag" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="flag-icon flag-icon-{{  app()->getLocale()=='fa'?'ir':'us'  }}"></i>
                        <span class="selected-language">{{  __(app()->getLocale())  }}</span> </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                        @foreach(config('translatable.locales') as $local)
                            <a class="dropdown-item" href="{{ Route::localizedUrl($local)}}"><i class="flag-icon flag-icon-{{  $local=='fa'?'ir':'us'  }}"></i> {{ __($local) }}
                            </a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item d-lg-block">
                    <a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a>
                </li>
            </ul>
        </div>
        <ul class="nav navbar-nav align-items-center ml-auto">
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name font-weight-bolder">{{ auth()->user()->name }}</span><span class="user-status">{{ __(auth()->user()->role) }}</span>
                    </div>
                    <span class="avatar"><img class="round" src="{{ asset('assets/admin/images/portrait/small/avatar-s-11.jpg') }}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{ route('admin.profile.index') }}"><i class="mr-50" data-feather="user"></i> {{__('Profile')}}
                    </a>
                    <a class="dropdown-item" href="page-account-settings.html"><i class="mr-50" data-feather="settings"></i> {{__('Settings')}}
                    </a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit()"><i class="mr-50" data-feather="power"></i> {{__('Logout')}}
                        </a>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav><!-- END: Header-->
