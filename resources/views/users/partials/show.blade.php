<x-app-layout>
    <x-slot name="title">
        Usuario
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Posts del usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-3">
                @foreach ($posts as $post)
                    <div class="p-6 text-gray-900 dark:text-gray-100 shadow rounded-lg">
                        <h3 class="text-md font-bold uppercase">{{$post['title']}}</h3>
                        <p class="text-sm"> Autor: {{$post->user->name }}</p>
                        <p class="pt-3"> {{ substr($post['content'], 0 , 200) }} ... </p>
                    </div>
                @endforeach
                <div class="p-9">{{$posts }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
