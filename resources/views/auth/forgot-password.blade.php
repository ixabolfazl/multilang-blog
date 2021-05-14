@extends('auth.layouts.app')
@section('content')
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row"></div>
            <div class="content-body">
                <div class="auth-wrapper auth-v1 px-2">
                    <div class="auth-inner py-2">
                        <div class="card mb-0">
                            <div class="card-body">
                                @if(Session::has('status'))
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <div class="alert-body">{{ Session::get('status') }}</div>
                                    </div>
                                @endif

                                <a href="javascript:void(0);" class="brand-logo">
                                    <h2 class="brand-text text-primary ml-1">Vuexy</h2>
                                </a>
                                <h4 class="card-title mb-1">Forgot Password? 🔒</h4>
                                <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your password</p>
                                <form class="auth-forgot-password-form mt-2" action="{{ route('password.email') }}" method="POST">
                                    @csrf
                                    <x-admin.input name="email" label="Email" placeholder="Email" tabindex="1"/>
                                    <button class="btn btn-primary btn-block" tabindex="2">Send reset link</button>
                                </form>

                                <p class="text-center mt-2">
                                    <a href="{{ route('login') }}"> <i data-feather="chevron-left"></i> Back to login
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="{{ asset('assets/admin/js/scripts/pages/page-auth-forgot-password.js') }}"></script>
@endsection
