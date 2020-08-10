@extends('layouts.app')
@section('content')

    @foreach($users as $user)
       <a href="{{$user->path() }}" class="flex items-center mb-5">
           <img src="{{$user->avatar()}}" alt="{{$user->username}}" width="60px" class="mr-4">
             <h4 class="font-bold">{{ '@'.$user->username}}</h4>
       </a>
    @endforeach

@endsection
