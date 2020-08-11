@extends('layouts.app')
<style>
   #myInput{
        outline: none;
    }
    input:focus{
        border-bottom: 1px solid #1f6fb2 !important;
    }
</style>
@section('content')
    <input id="myInput" type="text" class="placeholder-blue-500 text-md-left lg:w-11/12 mb-6" placeholder="Search Users" >
    <div id="users">
        @foreach($users as $user)
           <a href="{{$user->path() }}"  class="flex items-center mb-5">
               <img src="{{$user->avatar()}}" alt="{{$user->username}}" width="60px" class="mr-4">
                 <h4 class="font-bold">{{ '@'.$user->username}}</h4>
           </a>
        @endforeach
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#users a").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection

