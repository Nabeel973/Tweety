@extends('layouts.app')

@section('content')
    <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
        <div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">

            <form action="{{route('tweets.update',$tweet->id)}}" method="POST">
                @csrf
                @method('PATCH')
                <textarea name="body"  class="w-full" placeholder="What's up doc?" required style="outline: none;">{{$tweet->body}}</textarea>
                <hr class="my-4">

                <footer class="flex justify-between items-center">

                    <div class="flex items-center text-sm">
                        <img src="{{auth()->user()->avatar()}}" alt=""
                             class="border rounded-full mr-2" height="40px" width="40px">
                    </div>
                    <div class="flex justify-between items-center">
                        <button type="submit"
                                class="bg-blue-400 hover:bg-blue-500 rounded-full text-white shadow px-10 text-sm h-10 " style="outline: none;">
                            Save</button>
                        <a href="{{route('tweets.index')}}"  class="bg-blue-400 hover:bg-blue-500 rounded-full pt-2 text-white shadow px-10 text-sm h-10 ml-2" style="outline: none;">Cancel</a>
                    </div>

                </footer>
            </form>
            @error('body')
               <span class="text-red-500 font-sm mt-2">{{$message}}</span>
            @enderror

        </div>
    </div>
@endsection
