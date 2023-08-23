@extends('layouts.app')
@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf
    @if(Session::has('error'))
    <div class="alert alert-danger">
        {{ Session::get('error') }}
        @php
        Session::forget('error');
        @endphp
    </div>
    @endif
    <div class="form-group">
        <label for="">Your Address</label>
        <input id="email" type="email" class="my-form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Your Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Password</label>
        <input id="password" type="password" class="my-form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Your Password" required autocomplete="current-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <p class="f-pass">
        Forgot your password? <a href="/password/reset">recover password</a>
    </p>
    <div class="button-wrapper">
        <button type="submit" class="custom-button">Sign IN</button>
    </div>
    <div class="or">
        <p>OR</p>
    </div>
    <div class="or-content">
        <p>Sign up with your email</p>
        <a href="#" class="or-btn"><img src="assets/images/google.png" alt=""> Sign Up with Google</a>
        <p class="or-signup">
            Don't have an account? <a href="register">
                Sign up here
            </a>
        </p>
    </div>
</form>
@endsection

