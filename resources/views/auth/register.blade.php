@extends('layouts.blank')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h4 class="text-xl fw-bold">Daftar</h4>
            <div class="card border-0">
                <div class="card-body bg-white rounded-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-1">
                            <label for="name" class="col-12 col-form-label text-start">{{ __('Name') }}</label>

                            <div class="col-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-1">
                            <label for="email" class="col-12 col-form-label text-start">{{ __('Email Address') }}</label>

                            <div class="col-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-1">
                            <label for="password" class="col-12 col-form-label text-start">{{ __('Password') }}</label>

                            <div class="col-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-1">
                            <label for="password-confirm" class="col-12 col-form-label text-start">{{ __('Confirm Password') }}</label>

                            <div class="col-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-success w-100">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="text-center text-secondary d-flex align-items-center gap-2 col-12">
                                <hr style="height: 1px" class="bg-dark w-100" />
                                Atau
                                <hr style="height: 1px" class="bg-dark w-100" />
                            </div>
                            <div class="col-12">
                                <a href="{{route('login')}}" class="btn btn-light w-100">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
