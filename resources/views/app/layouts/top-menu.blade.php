<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
    <ul class="navbar-nav">
        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">{{ __('Home') }}</a></li>
        @foreach($categories as $category)
            <li class="nav-item">
                <a href="{{ route('category.show',$category->slug) }}" class="nav-link">{{ $category->name }}</a>
                @if($category->children()->count()>0)
                    <ul class="dropdown-menu">
                        @foreach($category->children as $subCategory)
                            <li class="nav-item">
                                <a href="{{ route('category.show',$subCategory->slug) }}" class="nav-link">{{ $subCategory->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </li>
        @endforeach
        @auth
            <li class="nav-item">
                <a href="#" class="nav-link"><i class="icofont-user-alt-5"></i> {{ auth()->user()->name }}</a>
                <ul class="dropdown-menu">
                    @can('viewAny','dashboard')
                        <li class="nav-item">
                            <a href="{{ route('admin.dashboard') }}" class="nav-link">{{ __('Dashboard') }}</a></li>
                    @endcan
                    @can('viewAny','profile')
                        <li class="nav-item">
                            <a href="{{ route('admin.profile.index') }}" class="nav-link">{{ __('Profile') }}</a></li>
                    @endcan
                    @can('viewAny',App\Models\Setting::class)
                        <li class="nav-item">
                            <a href="{{ route('admin.setting.index') }}" class="nav-link">{{ __('Setting') }}</a></li>
                    @endcan
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit()" class="nav-link">{{__('Logout')}}</a>
                        </form>
                    </li>
                </ul>
            </li>
        @endauth
        @guest
            <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link"><i class="icofont-user-alt-5"></i>{{__('Register')}}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('login') }}" class="nav-link"><i class="icofont-user-alt-5"></i> {{__('Login')}}</a>
            </li>
        @endguest
        <li class="nav-item">
            <a href="#" class="nav-link"><img src="{{  asset("assets/app/img/flag/".app()->getLocale().".png")  }}" alt="{{ app()->getLocale() }}-flag"> {{  __(app()->getLocale())  }}
            </a>
            <ul class="dropdown-menu">
                @foreach(config('translatable.locales') as $local)
                    <li class="nav-item"><a href="{{ Route::localizedUrl($local)}}" class="nav-link">
                            <img src="{{  asset("assets/app/img/flag/".$local.".png")  }}" alt="{{ $local }}-flag">
                            {{ __($local) }}</a></li>
                @endforeach
            </ul>
        </li>
    </ul>
    <div class="others-options">
        <ul>
            <li class="header-search">
                <div class="nav-search">
                    <div class="nav-search-button">
                        <i class="icofont-ui-search"></i>
                    </div>
                    <form>
                        <span class="nav-search-close-button" tabindex="0">✕</span>
                        <div class="nav-search-inner">
                            <input type="text" name="search" placeholder="{{__('Search')}}">
                        </div>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
