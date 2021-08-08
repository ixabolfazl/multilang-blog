@extends('auth.layouts.app')@section('title',__('Resest Password'))
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
                                <h4 class="card-title mb-1">{{ __('Resst Password') }} 🔒</h4>
                                <p class="card-text mb-2">{{__('Your new password must be different from previously used passwords')}}</p>
                                <form class="auth-reset-password-form mt-2" action="{{ route('password.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    <x-admin.input name="email" :label="__('Email')" :placeholder="__('Email')" tabindex="1"/>
                                    <x-admin.input name="password" :label="__('Password')" :placeholder="__('Password')" tabindex="2" type="password"/>
                                    <x-admin.input name="password_confirmation" :label="__('Confirm Password')" :placeholder="__('Confirm Password')" tabindex="3" type="password"/>
                                    <button class="btn btn-primary btn-block" tabindex="3">{{__('Set New Password')}}</button>
                                </form>
                                <p class="text-center mt-2">
                                    <a href="{{ route('login') }}"> <i data-feather="chevron-left"></i> {{ ('Login') }}
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
