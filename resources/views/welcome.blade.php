<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="h-16 flex flex-col sm:justify-center items-center pt-6 sm:pt-0 mb-6">
            <div>
                @if (Route::has('login'))
                    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right w-full dark:bg-gray-700">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="font-semibold text-white hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                            {{-- @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif --}}
                        @endauth
                    </div>
                @endif
            </div>
        </div>
        <div>
            <div class=" p-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden rounded-lg space-y-6">
                @foreach ($posts as $post)
                    <div class="p-6 text-gray-900 dark:text-gray-100 shadow rounded-lg border border-white">
                        <h3 class="text-md font-bold uppercase">
                            <a href="{{ route('post', $post) }}">
                                {{$post['title']}}
                            </a>
                        </h3>
                        <p class="text-sm"> Autor: {{$post->user->name }}</p>
                        <p class="pt-3"> {{ substr($post['content'], 0 , 200) }} ... </p>
                    </div>
                @endforeach
            </div>
            <div class="p-6 py-4 bg-white dark:bg-gray-800 shadow-md rounded-lg my-6">
                {{$posts}}
            </div>
        </div>
    </body>
</html>
