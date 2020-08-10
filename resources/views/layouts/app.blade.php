<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">



</head>
<body>
    <div id="app">
        @include('messages')
        <section class="px-8 py-4 mb-6">
            <header class="container mx-auto">
                <div class="flex item">
                    <img src="/images/logo1.png" alt="Tweety" class="mr-3">
                    <h1 class="font-bold text-xl">Tweety</h1>
                </div>
            </header>
        </section>
        <section class="px-8 py-6">
            <main class="container mx-auto">

                <div class="lg:flex lg:justify-between">

                    <div class="lg:w-32">
                        @include('sidebar_links')
                    </div>

                    <div class="lg:flex-1 lg:mx-10" style="max-width: 700px;">
                        @yield('content')
                    </div>

                    <div class="lg:w-1/6  rounded-lg p-4">
                        @include('friends_list')
                    </div>
                </div>

            </main>
        </section>
    </div>
<script src="http://unpkg.com/turbolinks"></script>
</body>
</html>
