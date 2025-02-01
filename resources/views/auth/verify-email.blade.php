@extends('layouts.newguest')

@section('content')
<div class="card">
    <div class="card-body">
        <h1 class="card-title text-center">Verify Your Email</h1>
        <p class="card-text">
            Thanks for signing up! Before getting started, please verify your email address by clicking the link we just emailed to you. If you didn’t receive the email, we’ll gladly send you another.
        </p>
        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success" role="alert">
                A new verification link has been sent to your email address.
            </div>
        @endif
        <form method="POST" action="{{ route('verification.send') }}" class="text-center">
            @csrf
            <button type="submit" class="btn btn-primary">Resend Verification Email</button>
        </form>

        <!-- <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button> -->
        </form>
    </div>
</div>
@endsection