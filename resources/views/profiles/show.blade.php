@extends('layouts.app')
@section('content')
    <header class="mb-6 relative ">
        <div class="relative">
            <img src="/images/Webp.net-resizeimage.png" alt="" class="mb-2 border">

            <img src="{{$user->avatar()}}" alt=""
                 class="rounded-full mr-2 absolute bottom-0 transform  "
                 width="150px" style="transform: translateX(16.5rem) translateY(4.5rem);">
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
    <p class="mb-3 text-sm">
        There are many variations of passages of Lorem Ipsum available,
        but the majority have suffered alteration in some form, by injected ,
        or randomised words which don't look even slightly believable.There are many variations of
        passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
        by injected humour, or randomised words which don't look even slightly believable.
    </p>


    @include('timeline',[
       'tweets'=> $user->tweets
    ])
@endsection
