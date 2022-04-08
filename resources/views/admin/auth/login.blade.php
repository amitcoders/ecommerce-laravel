@extends('admin.admin_layouts')
@section('admin_content')
<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Admin Login <span
                class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Professional Admin Template Design</div>

        <hr>
        <form method="POST" action="{{ route('admin.login') }}">
            @csrf
            <div class="form-group">
                <input id="email" type="email" placeholder="Enter your Email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div><!-- form-group -->
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Enter your password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
                @enderror

            </div><!-- form-group -->
            <button type="submit" class="btn btn-info btn-block">Sign In</button>
            @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
            @endif
        </form>


        <div class="mg-t-60 tx-center">Not yet a member? <a href="page-signup.html" class="tx-info">Sign Up</a></div>
    </div><!-- login-wrapper -->
</div><!-- d-flex -->
@endsection
