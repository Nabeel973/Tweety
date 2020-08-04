@extends('layouts.app')
@section('content')

    <h1 class="text-gray-700 text-2xl font-bold text-center">Edit Profile</h1>
    <div class="mt-5 mb-6">
        <img src="{{$user->avatar()}}" alt=""
             class="rounded-full mr-2  bottom-0 transform  "
             width="150px" style="transform: translateX(16.5rem);" >
    </div>

    {!! Form::open(['url' =>  $user->path(),'files' => true,'autocomplete'=>'off','method'=>'patch' ]) !!}

    <div id="flip" class="p-5 bg-gray-200">Basic Info</div>
    <div id="panel">
        <div class="mb-6">
            {!! Form::label('avatar', 'Select profile to upload') !!}
            {!!Form::file('avatar')!!}
        </div>
        <div class="mb-6">
            {!! Form::label('Name') !!}
            {!! Form::text('name', $user->name, ['class' => 'border border-gray-400 p-2 w-full']) !!}

        </div>
        <div class="mb-6">
            {!! Form::label('Username') !!}
            {!! Form::text('username', $user->username, ['class' => 'border border-gray-400 p-2 w-full']) !!}

        </div>
        <div class="mb-6">
            {!! Form::label('Email') !!}
            {!! Form::email('email', $user->email, ['class' => 'border border-gray-400 p-2 w-full']) !!}

        </div>
        <div class="mb-6">
            {!! Form::label('Password') !!}
            {!! Form::text('password', null, ['class' => 'border border-gray-400 p-2 w-full']) !!}

        </div>
        <div class="mb-6">
            {!! Form::label('Confirm Password') !!}
            {!! Form::text('confirm_password', null, ['class' => 'border border-gray-400 p-2 w-full']) !!}

        </div>

    </div>

    <div id="main" class="p-5 bg-gray-200">Background</div>
    <div id="child">
        <div class="mt-6">
            {!! Form::label('background', 'Select background image to upload') !!}
            {!!Form::file('background')!!}
        </div>
        <div class="mt-6">
            {!! Form::label('Description') !!}
            {!! Form::text('description', $user->description, ['class' => 'border border-gray-400 p-2 w-full']) !!}

        </div>
    </div>

    <div class="mt-6">
        {!! Form::submit('Submit',['class' => 'bg-blue-500 text-white rounded py-2 px-4 hover:bg-blue-600']) !!}
    </div>
    {!! Form::close() !!}


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

