@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Email verification required</h1>
        <p>Please click on the link sent to your e-mail address.</p>

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                A new verification link has been sent to your email address.
            </div>
        @endif

        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                Resend verification email
            </button>.
        </form>
    </div>
@endsection
