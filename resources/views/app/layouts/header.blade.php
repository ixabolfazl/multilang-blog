<header class="header-area">

    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-8">


                    <ul class="top-nav">
                        <li><a href="index.htm#">وبلاگ</a></li>
                        <li><a href="index.htm#">انجمن ها</a></li>
                        <li><a href="index.htm#">تماس با ما</a></li>
                        <li><a href="index.htm#">تبلیغات</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-4 text-right">
                    <ul class="top-social">
                        @include('app.layouts.social')
                    </ul>
                    <div class="header-date">
                        <i class="icofont-clock-time"></i> جمعه 15 بهمن
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="navbar-area">
        <div class="sinmun-mobile-nav">
            <div class="logo">
                <a href="index.html"><img src="{{ asset('assets/app/img/logo.png') }}" alt="logo"></a>
            </div>
        </div>
        <div class="sinmun-nav">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="index.html"><img src="{{ asset('assets/app/img/logo.png') }}"
                                                                   alt="logo"></a>
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
