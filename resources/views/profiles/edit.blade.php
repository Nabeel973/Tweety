@extends('layouts.app')
@section('content')

    <h1 class="text-gray-700 text-2xl font-bold text-center">Edit Profile</h1>
    <div class="mt-5 mb-6">
        <img src="{{$user->avatar()}}" alt=""
             class="rounded-full mr-2  bottom-0 transform  "
             width="150px" style="transform: translateX(16.5rem);" >
    </div>

    <form method="POST"  action="{{$user->path() }}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div id="flip" class="p-5 bg-gray-200">Basic Info</div>
        <div id="panel">
            <div class="mb-6 mt-6">
                <label for="avatar">Select Profile to Upload</label>
                <input id="avatar" type="file" class="@error('avatar') is-invalid @enderror" name="avatar">
                @error('avatar')
                <div class="text-red-800">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="name">Name</label>
                <input id="name" type="text" class="@error('name') is-invalid @enderror border border-gray-400 p-2 w-full" name="name" value="{{$user->name}}">
                @error('name')
                <div class="text-red-800">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" class="@error('username') is-invalid @enderror border border-gray-400 p-2 w-full" value="{{$user->username}}">
                @error('username')
                <div class="text-red-800">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="email">Email</label>
                <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror border border-gray-400 p-2 w-full" value="{{$user->email}}">
                @error('email')
                <div class="text-red-800">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" class="@error('password') is-invalid @enderror border border-gray-400 p-2 w-full" >
                @error('password')
                <div class="text-red-800">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" class="@error('password_confirmation') is-invalid @enderror border border-gray-400 p-2 w-full" >
                @error('password_confirmation')
                <div class="text-red-800">{{ $message }}</div>
                @enderror
            </div>



        </div>
        <div id="main" class="p-5 bg-gray-200">Background</div>
        <div id="child">
            <div class="mb-6 mt-6">
                <label for="background">Select Background image to Upload</label>
                <input id="background" type="file" class="@error('background') is-invalid @enderror" name="background">
                @error('background')
                <div class="text-red-800">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label for="description">Description</label>
                <input id="description" type="text"  name="description" class="@error('description') is-invalid @enderror border border-gray-400 p-2 w-full" value="{{$user->description}}">
                @error('description')
                <div class="text-red-800">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mt-6">
            <button type="submit" class="bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-800'">Submit</button>
            <a href="{{$user->path()}}" class="hover:text-blue-700 ml-4">Cancel</a>
        </div>

    </form>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#flip").click(function(){
                $("#panel").slideToggle("slow");
            });
            $("#main").click(function(){
                $("#child").slideToggle("slow");
            });
        });
    </script>
@endsection

