@extends('layouts.homescreen')

@section('content')
    <div class="container" style="margin-left: auto;">
        <div class="row" style="transform: translateY(50%) translateX(50%);width: 40%;" >

                <div class="card" style="text-align: center;background-color: #9bd2f1; border-radius: 20px;">
                    <div class="card-header font-bold mb-4 text-2xl">{{ __('Login') }}</div>

                    <div class="card-body" style="text-align: center;">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row mb-4">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <br>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <br>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class=" bg-blue-500 border rounded-full" style="width: 20%; color: white;" >
                                        {{ __('Login') }}
                                    </button>
                                    <br>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link pb-10 " href="{{ route('password.request') }}" style="margin-bottom: 10%;">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                    <br>
                                </div>
                            </div>
                        </form>
                        <div class="mb-6 " style="margin-bottom: 10% !important;">
                            <a href="/register">Create an Account</a>
                        </div>
                    </div>
                </div>

        </div>
    </div>@endsection
