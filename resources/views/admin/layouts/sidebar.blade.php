<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="#">
                    <h2 class="brand-text">{{ $setting[app()->getLocale()]->site_name }}</h2>
                </a></li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            @can('viewAny','dashboard')
                <li class="nav-item {{ !request()->routeIs(app()->getLocale().'.admin.dashboard') ?: 'active'}}">
                    <a class="d-flex align-items-center" href="{{ route('admin.dashboard') }}">
                        <i data-feather="home"></i>
                        <span class="menu-title text-truncate" data-i18n="Home">{{ __('Dashboard') }}</span> </a>
                </li>
            @endcan
            @can('viewAny',App\Models\Post::class)
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="#"><i data-feather='file-text'></i>
                        <span class="menu-title text-truncate" data-i18n="Page Layouts">{{__('Posts')}}</span> </a>
                    <ul class="menu-content">
                        @can('viewAny',App\Models\Post::class)
                            <li class="{{ !request()->routeIs(app()->getLocale().'.admin.posts.index') ?: 'active'}}">
                                <a class="d-flex align-items-center" href="{{ route('admin.posts.index') }}"><i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="Collapsed Menu">{{__('Posts')}}</span></a>
                            </li>
                        @endcan
                        @can('create',App\Models\Post::class)
                            <li class="{{ !request()->routeIs(app()->getLocale().'.admin.posts.create') ?: 'active'}}">
                                <a class="d-flex align-items-center" href="{{ route('admin.posts.create') }}"><i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="Collapsed Menu">{{__('New Post')}}</span></a>
                            </li>
                        @endcan
                        @can('trash',App\Models\Post::class)
                            <li class="{{ !request()->routeIs(app()->getLocale().'.admin.posts.trash') ?: 'active'}}">
                                <a class="d-flex align-items-center" href="{{ route('admin.posts.trash') }}"><i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="Collapsed Menu">{{__('Deleted Posts')}}</span></a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan

            @can('viewAny',App\Models\User::class)
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="#"><i data-feather="user"></i>
                        <span class="menu-title text-truncate" data-i18n="Page Layouts">{{__('Users')}}</span> </a>
                    <ul class="menu-content">
                        @can('viewAny',App\Models\User::class)
                            <li class="{{ !request()->routeIs(app()->getLocale().'.admin.users.index') ?: 'active'}}">
                                <a class="d-flex align-items-center" href="{{ route('admin.users.index') }}"><i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="Collapsed Menu">{{__('Users')}}</span></a>
                            </li>
                        @endcan
                        @can('create',App\Models\User::class)
                            <li class="{{ !request()->routeIs(app()->getLocale().'.admin.users.create') ?: 'active'}}">
                                <a class="d-flex align-items-center" href="{{ route('admin.users.create') }}"><i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="Collapsed Menu">{{__('New User')}}</span></a>
                            </li>
                        @endcan
                        @can('trash',App\Models\User::class)
                            <li class="{{ !request()->routeIs(app()->getLocale().'.admin.users.trash') ?: 'active'}}">
                                <a class="d-flex align-items-center" href="{{ route('admin.users.trash') }}"><i data-feather="circle"></i>
                                    <span class="menu-item" data-i18n="Collapsed Menu">{{__('Deleted Users')}}</span></a>
                            </li>
                        @endcan
                    </ul>
                </li>
            @endcan
            @can('viewAny',App\Models\Category::class)
                <li class="nav-item {{ !request()->routeIs(app()->getLocale().'.admin.categories.index') ?: 'active'}}">
                    <a class="d-flex align-items-center" href="{{ route('admin.categories.index') }}"><i data-feather='layers'></i>
                        <span class="menu-title text-truncate" data-i18n="Page Layouts">{{__('Categories')}}</span> </a>
                </li>
            @endcan
            @can('viewAny',App\Models\Comment::class)
                <li class="nav-item {{ !request()->routeIs(app()->getLocale().'.admin.comments.index') ?: 'active'}}">
                    <a class="d-flex align-items-center" href="{{ route('admin.comments.index') }}"><i data-feather='message-square'></i>
                        <span class="menu-title text-truncate" data-i18n="Page Layouts">{{__('Comments')}}</span> </a>
                </li>
            @endcan
            @can('viewAny','profile')
                <li class="nav-item {{ !request()->routeIs(app()->getLocale().'.admin.profile.index') ?: 'active'}}">
                    <a class="d-flex align-items-center" href="{{ route('admin.profile.index') }}"><i data-feather='user'></i>
                        <span class="menu-title text-truncate" data-i18n="Page Layouts">{{__('Profile')}}</span> </a>
                </li>
            @endcan
            @can('viewAny',App\Models\Setting::class)
                <li class="nav-item {{ !request()->routeIs(app()->getLocale().'.admin.setting.index') ?: 'active'}}">
                    <a class="d-flex align-items-center" href="{{ route('admin.setting.index') }}"><i data-feather='user'></i>
                        <span class="menu-title text-truncate" data-i18n="Page Layouts">{{__('Setting')}}</span> </a>
                </li>
            @endcan
        </ul>
    </div>
</div><!-- END: Main Menu-->

