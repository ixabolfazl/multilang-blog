<header class="header-area">
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8"></div>
                <div class="col-lg-6 col-md-4 text-right">
                    <div class="header-date">
                        {{ app()->getLocale()=='fa'? Verta::now()->day." ".Verta::now()->formatWord(' F ')." ".Verta::now()->year : \Carbon\Carbon::now()->format('M d ,Y') }}
                        <i class="icofont-clock-time"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar-area">
        <div class="sinmun-mobile-nav">
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ asset($setting[app()->getLocale()]->logo_url) }}" alt="logo"></a>
            </div>
        </div>
        <div class="sinmun-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a href="{{ route('home') }}"><img src="{{ asset($setting[app()->getLocale()]->logo_url) }}" alt="logo"></a>
                    @include('app.layouts.top-menu')
                </nav>
            </div>
        </div>
    </div>
    <div class="breaking-news">
        <div class="container">
            @include('app.layouts.breaking-news')
        </div>
    </div>
</header>
