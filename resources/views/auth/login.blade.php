@extends('layouts.blank')

@section('content')
<div class="container" style="height: 90vh">
    <div class="row justify-content-center h-screen align-items-center">
        <div class="col-md-5">
            <h4 class="text-2xl fw-bold mb-3">Login Survey</h4>
            <div class="card bg-white border-0 shadow-2">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row flex-column justiy-content-start mb-3">
                            <label for="email" class="col-md-4 col-form-label text-start">{{ __('Email Address') }}</label>

                            <div class="col-12">
                                <input id="email" type="email" class="form-control w-full @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row flex-column justiy-content-start mb-3">
                            <label for="password" class="col-md-4 col-form-label text-start">{{ __('Password') }}</label>

                            <div class="col-12">
                                <input id="password" type="password" class="form-control w-100 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-check w-full">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success w-100">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-success d-block" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="text-center text-secondary d-flex align-items-center gap-2 col-12">
                                <hr style="height: 1px" class="bg-dark w-100" />
                                Atau
                                <hr style="height: 1px" class="bg-dark w-100" />
                            </div>
                            <div class="col-12">
                                <a href="{{route('register')}}" class="btn btn-light w-100">Register</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
