@extends('layouts.homescreen')

@section('content')
    <div class="container mx-auto flex justify-center" >
        <div class="px-16 py-6 bg-blue-200 rounded-lg"  >
                <div class="col-md-8 text-center">

                        <div class="font-bold mb-4 text-2xl">{{ __('Login') }}</div>


                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-6">
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror border border-gray-400 p-2 w-full" name="email">
                                    @error('email')
                                    <div class="text-red-800">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-6">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="@error('password') is-invalid @enderror border border-gray-400 p-2 w-full" name="password">
                                    @error('password')
                                    <div class="text-red-800">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group row mb-2">
                                        <button type="submit" class="bg-blue-500 text-white text-center rounded py-2 px-12 hover:bg-blue-800"  >
                                            {{ __('Login') }}
                                        </button>

                                </div>
                            </form>
                            <div class="mt-6 ">
                                <a href="/register">Create an Account</a>
                            </div>


                </div>
        </div>
    </div>@endsection
