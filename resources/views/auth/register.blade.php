@extends('layouts.homescreen')

@section('content')
<div class="container mx-auto flex justify-center">
    <div class="px-16 py-6 bg-blue-200 rounded-lg"  >
        <div class="col-md-8 text-center">

                <div class="font-bold mb-4 text-2xl">{{ __('Register') }}</div>


                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-1">
                            <label for="username">Username</label>
                            <input id="email" type="text" class="@error('username') is-invalid @enderror border border-gray-400 p-2 w-full" name="username">
                            @error('email')
                            <div class="text-red-800">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="name">Name</label>
                            <input id="name" type="text" class="@error('name') is-invalid @enderror border border-gray-400 p-2 w-full" name="name">
                            @error('name')
                            <div class="text-red-800">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-1">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="@error('email') is-invalid @enderror border border-gray-400 p-2 w-full" name="email">
                            @error('name')
                            <div class="text-red-800">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-1">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="@error('password') is-invalid @enderror border border-gray-400 p-2 w-full" name="password">
                            @error('password')
                            <div class="text-red-800">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-1">
                            <label for="password_confirmation">Password Confirmation</label>
                            <input id="password_confirmation" type="password" class="@error('password_confirmation') is-invalid @enderror border border-gray-400 p-2 w-full" name="password_confirmation">
                            @error('password_confirmation')
                            <div class="text-red-800">{{ $message }}</div>
                            @enderror
                        </div>


                            <div class="col-md-6  mt-6 offset-md-4">
                                <button type="submit" class="bg-blue-500 text-white text-center rounded py-2 px-12 hover:bg-blue-800" >
                                    {{ __('Register') }}
                                </button>
                            </div>

                    </form>

                    <div class="mt-2">
                        <a href="{{route('login')}}">Already have an account</a>
                    </div>


        </div>
    </div>
</div>
@endsection
