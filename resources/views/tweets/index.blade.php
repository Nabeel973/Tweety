@extends('layouts.app')

@section('content')
    <div class="lg:flex-1 lg:mx-10" style="max-width: 700px">
        @include('publish_tweet_panel')
        @include('timeline')

    </div>
@endsection
