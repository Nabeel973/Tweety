@extends('layouts.app')
@section('content')

    @foreach($users as $user)
       <a href="{{$user->path() }}" class="flex items-center mb-5">
           @if($user->avatar)
               <img src="{{$user->avatar()}}" alt="{{$user->username}}" width="60px" class="mr-4">
           @else
               <img src="{{$user->default_user()}}" alt="{{$user->username}}" width="60px" class="mr-4">
           @endif
             <h4 class="font-bold">{{ '@'.$user->username}}</h4>
       </a>
    @endforeach

@endsection
