@extends('auth.layouts.app')@section('title',__('Login'))
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
                                    <h2 class="brand-text text-primary ml-1">{{ $setting[app()->getLocale()]->site_name }}</h2>
                                </a>
                                <form class="auth-login-form mt-2" action="{{ route('login.store') }}" method="POST">
                                    @csrf
                                    <x-admin.input name="username" :label="__('Email Or Phone')" :placeholder="__('Email Or Phone')" tabindex="1"/>
                                    <x-admin.input name="password" :label="__('Password')" :placeholder="__('Password')" tabindex="2" type="password">
                                        <a href="{{ route('password.request') }}"><small>{{__('Forgot Password')}}</small></a>
                                    </x-admin.input>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input class="custom-control-input" name="remember" id="remember" type="checkbox" tabindex="3"/>
                                            <label class="custom-control-label" for="remember"> {{__('Remember Me')}} </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-block" tabindex="4">{{__('Login')}}</button>
                                </form>

                                <p class="text-center mt-2">
                                    <span>{{__('Are you a new user?')}}</span> <a href="{{ route('register') }}">
                                        <span>{{__('Create an account')}}</span> </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection




