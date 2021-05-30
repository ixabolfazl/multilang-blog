<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="#"> <span class="brand-logo">logo</span>
                    <h2 class="brand-text">site name</h2>
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
            <li class="nav-item {{ !request()->routeIs(app()->getLocale().'.admin.dashboard') ?: 'active'}}">
                <a class="d-flex align-items-center" href="{{ route('admin.dashboard') }}"> <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Home">{{ __('Dashboard') }}</span> </a>
            </li>
            <li class="nav-item">
                <a class="d-flex align-items-center" href="#"><i data-feather="user"></i>
                    <span class="menu-title text-truncate" data-i18n="Page Layouts">{{__('Users')}}</span> </a>
                <ul class="menu-content">
                    <li class="{{ !request()->routeIs(app()->getLocale().'.admin.users.index') ?: 'active'}}">
                        <a class="d-flex align-items-center" href="{{ route('admin.users.index') }}"><i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="Collapsed Menu">{{__('Users')}}</span></a>
                    </li>
                    <li class="{{ !request()->routeIs(app()->getLocale().'.admin.users.create') ?: 'active'}}">
                        <a class="d-flex align-items-center" href="{{ route('admin.users.create') }}"><i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="Collapsed Menu">{{__('New User')}}</span></a>
                    </li>
                    <li class="{{ !request()->routeIs(app()->getLocale().'.admin.users.trash') ?: 'active'}}">
                        <a class="d-flex align-items-center" href="{{ route('admin.users.trash') }}"><i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="Collapsed Menu">{{__('Deleted Users')}}</span></a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="d-flex align-items-center" href="#"><i data-feather='layers'></i>
                    <span class="menu-title text-truncate" data-i18n="Page Layouts">{{__('Categories')}}</span> </a>
                <ul class="menu-content">
                    <li class="{{ !request()->routeIs(app()->getLocale().'.admin.categories.index') ?: 'active'}}">
                        <a class="d-flex align-items-center" href="{{ route('admin.categories.index') }}"><i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="Collapsed Menu">{{__('Categories')}}</span></a>
                    </li>
                    <li class="{{ !request()->routeIs(app()->getLocale().'.admin.categories.create') ?: 'active'}}">
                        <a class="d-flex align-items-center" href="{{ route('admin.categories.create') }}"><i data-feather="circle"></i>
                            <span class="menu-item" data-i18n="Collapsed Menu">{{__('New Category')}}</span></a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div><!-- END: Main Menu-->

