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
                                <a href="javascript:void(0);" class="brand-logo">
                                    <h2 class="brand-text text-primary ml-1">Vuexy</h2>
                                </a>

                                <h4 class="card-title mb-1">Adventure starts here 🚀</h4>
                                <p class="card-text mb-2">Make your app management easy and fun!</p>

                                <form class="auth-register-form mt-2" action="{{ route('register.store') }}" method="POST">
                                    @csrf
                                    <x-admin.input name="name" label="Name" placeholder="john doe" tabindex="1"/>
                                    <x-admin.input name="email" label="Email" placeholder="Email" tabindex="2"/>
                                    <x-admin.input name="phone" label="Phone" placeholder="Phone" tabindex="3"/>
                                    <x-admin.input name="password" label="Password" placeholder="Password" tabindex="4" type="password"/>
                                    <x-admin.input name="password_confirmation" label="Confirm Password" placeholder="Confirm Password" tabindex="5" type="password"/>
                                    <button class="btn btn-primary btn-block" type="submit" tabindex="5">Sign up</button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>Already have an account?</span> <a href="{{ route('login') }}">
                                        <span>Sign in instead</span> </a>
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
    <script src="{{ asset('assets/admin/js/scripts/pages/page-auth-register.js') }}"></script>
@endsection
