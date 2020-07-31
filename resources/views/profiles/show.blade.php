@extends('layouts.app')
@section('content')
    <header class="mb-6 relative ">
        <div class="relative">
            @if($user->background)
                <img src="{{$user->background()}}" alt="" class="mb-2 border">
            @else
                <img src="{{$user->default_background()}}" alt="" class="mb-2 border" style="background-size: cover;">
            @endif

            @if($user->avatar)
            <img src="{{$user->avatar()}}" alt=""
                 class="rounded-full mr-2 absolute bottom-0 transform  "
                 width="150px" style="transform: translateX(16.5rem) translateY(4.5rem);">
             @else
                <img src="{{$user->default_user()}}" alt=""
                     class="rounded-full mr-2 absolute bottom-0 transform  "
                     width="150px" style="transform: translateX(16.5rem) translateY(4.5rem);">
            @endif
        </div>
    </header>

    <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="font-bold text-2xl">{{$user->name}}</h2>
            <p class="text-sm">{{$user->created_at}}</p>
        </div>


        <div class="flex justify-between">
           {{-- @if(current_user()->is($user))
                <a href="{{route('profile.edit',current_user()->name)}}"  class=" rounded-full border border-gray-300 rounded-lg font-bold   py-2 px-2 ">Edit Profile</a>
            @endif--}}
            @can('edit',$user)
                <a href="{{route('profile.edit',current_user()->username)}}"  class=" rounded-full border border-gray-300 rounded-lg font-bold   py-2 px-2 ">Edit Profile</a>
            @endcan
                @if(current_user()->isNot($user))
                      <form action="/profiles/{{$user->name}}/follow" method="post">
                @csrf
                <button type="submit" class=" rounded-full bg-blue-500 text-white rounded-lg  py-2 px-2 "
                >{{current_user()->following($user) ? 'Unfollow Me': 'Follow Me' }}</button>

            </form>
            @endif
        </div>
    </div>

    @if($user->description)
        <p class="mb-3 text-sm">{{$user->description}}</p>
    @else
        <p class="mb-3 text-sm text-gray-700">Add Description</p>
    @endif

    @include('timeline',[
       'tweets'=> $user->tweets
    ])
@endsection
