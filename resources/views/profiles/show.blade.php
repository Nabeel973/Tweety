@extends('layouts.app')
@section('content')
    <header class="mb-6 relative ">
        <img src="/images/Webp.net-resizeimage.png" alt="" class="mb-2 border">
    </header>

    <div class="flex justify-between items-center mb-4">
        <div>
            <h2 class="font-bold text-2xl">{{$user->name}}</h2>
            <p class="text-sm">{{$user->created_at}}</p>
        </div>

        <div>
            <button type="submit"rounded-full class="border border-gray-300 rounded-lg font-bold   py-2 px-2 ">Edit Profile</button>
            <button type="submit" class="bg-blue-500 text-white rounded-lg  py-2 px-2 ">Follow Me</button>

        </div>
    </div>
    <p class="mb-3 text-sm">
        There are many variations of passages of Lorem Ipsum available,
        but the majority have suffered alteration in some form, by injected ,
        or randomised words which don't look even slightly believable.There are many variations of
        passages of Lorem Ipsum available, but the majority have suffered alteration in some form,
        by injected humour, or randomised words which don't look even slightly believable.
    </p>
    <img src="{{$user->avatar()}}" alt=""
    class="rounded-full mr-2 absolute"
    style="width:150px;left:calc(49% - 75px);top: 38%"
    >

    @include('timeline',[
       'tweets'=> $user->tweets
    ])
@endsection
