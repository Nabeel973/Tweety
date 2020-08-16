@extends('layouts.app')
@section('content')
    <header class="mb-6 relative ">
        <div class="relative">
            <img src="{{$user->background()}}" alt="" class="mb-2 border">

            <img src="{{$user->avatar()}}" alt=""
                 class="rounded-full mr-2 absolute bottom-0 transform  "
                 width="150px" style="transform: translateX(16.5rem) translateY(4.5rem);">
        </div>
    </header>

    <div class="flex justify-between items-center mb-4">
        <div style="max-width: 270px;">
            <h2 class="font-bold text-2xl">{{$user->name}}</h2>
            <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
        </div>

        <div class="flex justify-between">
            @can('edit',$user)
                <a href="{{route('profile.edit',current_user()->username)}}"  class=" rounded-full border border-gray-300 rounded-lg font-bold   py-2 px-2 ">Edit Profile</a>
            @endcan
                @if(current_user()->isNot($user))
                      <form action="/profiles/{{$user->name}}/follow" method="post">
                @csrf
                <button type="submit" class=" bg-blue-400 hover:bg-blue-500 rounded-full text-white shadow px-8 text-sm h-10"
                        style="outline: none;">{{current_user()->following($user) ? 'Unfollow Me': 'Follow Me' }}</button>

            </form>
            @endif
        </div>
    </div>

    @if($user->description)
        <p class="mb-3 text-sm">{{$user->description}}</p>
    @else
        @can('edit',$user)
            <p class="mb-3 text-sm text-gray-700">Add Description</p>
        @endcan

    @endif

    @include('timeline',[
       'tweets'=> $tweets
    ])
@endsection
