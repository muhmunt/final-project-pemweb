@extends('layouts.app')

@section('content')
{{-- <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('{{asset("/assets/images/bg-login.svg'")}}"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <div class="mb-4">
              <h3>Sign Up</h3>
              <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
            </div>
            <form action="{{ route('register') }}" method="POST">
              @csrf

                @error('email')
                    <span class="invalid-feedback d-block" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

              <div class="form-group first">
                <label for="email">{{ __('Email Address') }}</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required autocomplete="email" autofocus>
              </div>
              <div class="form-group second">
                <label for="password">{{ __('Password') }}</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="current-password">
              </div>
              <div class="form-group last mb-3">
                <label for="password">{{ __('Confirm Password') }}</label>
                <input type="password" class="form-control" id="password" name="password_confirmation" required>
              </div>
                @error('password')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                @enderror

                <div class="d-flex mb-5 align-items-center">
                    <span class="ml-auto"><a href="{{ route('login') }}" class="forgot-pass">Already have account? Sign in</a></span>
                </div>

                <button type="submit" class="btn btn-block btn-primary">
                    {{ __('Register') }}
                </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div> --}}


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
