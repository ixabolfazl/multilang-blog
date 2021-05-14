<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('app.layouts.meta')
    @include('app.layouts.styles')
    <link rel="icon" type="image/png" href="{{ asset('assets/app/img/favicon.png') }}">
</head>

<body>

@include('app.layouts.header')

@yield('content')

@include('app.layouts.footer')

@include('app.layouts.scripts')

</body>

</html>
