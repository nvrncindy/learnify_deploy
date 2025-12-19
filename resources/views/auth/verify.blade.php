@extends('layouts.app')

@section('content')
@push('styles')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endpush

<div class="auth-container">
    <div class="auth-card">

        <h3>Email Verification</h3>
        <p>Please check your inbox to verify your account.</p>

        @if (session('resent'))
            <div class="alert alert-success text-center mt-2">
                {{ __('Already send to your email!') }}
            </div>
        @endif

        <p class="text-center mt-3">Not received verification email?</p>

        <form method="POST" action="{{ route('verification.resend') }}" class="text-center">
            @csrf
            <button type="submit" class="auth-btn mt-2">
                Resend Verification Email
            </button>
        </form>

        <p class="bottom-text mt-4 mb-0">
            <a href="{{ route('login') }}">Back Login Page</a>
        </p>

    </div>
</div>
@endsection
