@extends('auth.layouts.app')@section('title',__('Register'))
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
                                    <h2 class="brand-text text-primary ml-1">{{ $setting[app()->getLocale()]->site_name }}</h2>
                                </a>
                                <form class="auth-register-form mt-2" action="{{ route('register.store') }}" method="POST">
                                    @csrf
                                    <x-admin.input name="name" :label="__('Name')" :placeholder="__('Name')" tabindex="1"/>
                                    <x-admin.input name="email" :label="__('Email')" :placeholder="__('Email')" tabindex="2"/>
                                    <x-admin.input name="phone" :label="__('Phone Number')" :placeholder="__('Phone Number')" tabindex="3"/>
                                    <x-admin.input name="password" :label="__('Password')" :placeholder="__('Password')" tabindex="4" type="password"/>
                                    <x-admin.input name="password_confirmation" :label="__('Confirm Password')" :placeholder="__('Confirm Password')" tabindex="5" type="password"/>
                                    <button class="btn btn-primary btn-block" type="submit" tabindex="5">{{__('Register')}}</button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>{{__('Already have an account?')}}</span> <a href="{{ route('login') }}">
                                        <span>{{ __('Login') }}</span> </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
