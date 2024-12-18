@extends('layout.app')

@php
    $isNavbar = false;
    $isSidebar = false;
    $isFooter = false;
@endphp

@section('title', __('Login'))

@section('content')
<style>

    .login-container {
        max-width: 400px;
        margin: 40px auto;
        padding: 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0,0,0,0.1);
    }
    .social-login {
        border-top: 1px solid #dee2e6;
        padding-top: 20px;
        margin-top: 20px;
    }
    .btn-social {
        width: 100%;
        margin: 5px 0;
        padding: 8px;
    }

</style>


<div class="login-container">
    <!-- Logo -->
    <a class="d-flex align-items-center justify-content-center text-black fs-4 mb-3" href="{{ route('home') }}">
        <div class="">
            <i class="mdi mdi-home-outline"></i>
        </div>
        <div class="mx-3">Dashboard</div>
    </a>

    <!-- Welcome Text -->
    <h2 class="mb-1">{{ __('Welcome Back!') }}</h2>
    <p class="text-muted mb-1">{{ __('Please login to your account') }}</p>

    <!-- Login Form -->
    <form>
        <div class="mb-3">
            <div class="input-group">
                <span class="input-group-text bg-transparent">
                    <i class="mdi mdi-email-outline"></i>
                </span>
                <input type="email" class="form-control" placeholder="{{ __('Email address') }}" required>
            </div>
        </div>
        <div class="mb-3">
            <div class="input-group">
                <span class="input-group-text bg-transparent">
                    <i class="mdi mdi-lock-outline"></i>
                </span>
                <input type="password" class="form-control" placeholder="Password" required>
            </div>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember">
            <label class="form-check-label" for="remember">{{ __('Remember me') }}</label>
        </div>
        <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>
    </form>

    <!-- Social Login -->
    <div class="social-login">
        <p class="text-center text-muted">{{ __('Or login with') }}</p>
        <button class="btn btn-outline-danger btn-social">
            <i class="mdi mdi-google me-2"></i>
            {{ __('Login with Google') }}
        </button>
        <button class="btn btn-outline-primary btn-social">
            <i class="mdi mdi-facebook me-2"></i>
            {{ __('Login with Facebook') }}
        </button>
    </div>
</div>


@endsection
