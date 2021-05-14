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
                                <a href="" class="brand-logo">
                                    <h2 class="brand-text text-primary ml-1">Vuexy</h2>
                                </a>

                                <h4 class="card-title mb-1">Welcome to Vuexy! 👋</h4>
                                <p class="card-text mb-2">Please sign-in to your account and start the adventure</p>


                                <form class="auth-login-form mt-2" action="{{ route('login.store') }}" method="POST">
                                    @csrf
                                    <x-admin.input name="username" label="Email Or Phone" placeholder="Email Or Phone" tabindex="1"/>
                                    <x-admin.input name="password" label="Password" placeholder="Password" tabindex="2" type="password">
                                        <a href="{{ route('password.request') }}"><small>Forgot Password?</small></a>
                                    </x-admin.input>


                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="remember" id="remember" type="checkbox" tabindex="3"/>
                                            <label class="custom-control-label" for="remember"> Remember Me </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block" tabindex="4">Sign in</button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>New on our platform?</span> <a href="{{ route('register') }}">
                                        <span>Create an account</span> </a>
                                </p>

                                <div class="divider my-2">
                                    <div class="divider-text">or</div>
                                </div>

                                <div class="auth-footer-btn d-flex justify-content-center">
                                    <a href="" class="btn btn-facebook"> <i data-feather="facebook"></i> </a>
                                    <a href="" class="btn btn-twitter white"> <i data-feather="twitter"></i> </a>
                                    <a href="" class="btn btn-google"> <i data-feather="mail"></i> </a>
                                    <a href="" class="btn btn-github"> <i data-feather="github"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="{{ asset('assets/admin/js/scripts/pages/page-auth-login.js') }}"></script>
@endsection



