@extends('layouts.empty')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                          <img src="/images/logo.png" alt="logo" width="120" height="120">
                        <h4 class="logo-text text-success mt-3">WEB-BASED STUDENT LEARNING SYSTEM</h4>
                    </div>

                   <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="text-md-end">{{ __('Username') }}</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="text-md-end">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="mb-0 d-grid">
                            <button type="submit" class="btn btn-success">
                                {{ __('Login') }}
                            </button>
                            <a class="btn btn-primary mt-2" href="{{ route('register') }}">Register</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
