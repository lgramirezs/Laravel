<x-app-layout>
    <x-slot name="title">
        Posts
    </x-slot>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Posts') }}
            </h2>
            <x-tertiary-button :href="route('posts.create')">Create new post</x-tertiary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-3 mb-3">
                <form action="{{route('posts.index') }}" method="GET">
                    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                    <div class="relative">
                        <input type="text" name="search" id="default-search" class="uppercase block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required value="{{ request('search') }}">
                        <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                    </div>
                </form>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-3 mb-3">
                <p class="text-white pb-6">Filter by authors</p>
                @foreach ($users as $user)
                    <a class="p-2 text-white font-bold rounded-lg border border-white" href="{{route('users.show', $user)}}">{{ $user->name}}</a>
                @endforeach
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-3">
                @foreach ($posts as $post)
                    <div class="p-6 text-gray-900 dark:text-gray-100 shadow rounded-lg">
                        <h3 class="text-md font-bold uppercase">{{$post['title']}}</h3>
                        <div class="text-sm text-white opacity-75 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                            {{ $post->user->name }}
                        </div>
                        <p class="pt-3"> {{ substr($post['content'], 0 , 200) }} ... </p>
                        <div class="pt-6 flex items-center justify-start space-x-3">
                            <a class="bg-gray-500 p-2.5 rounded-lg font-semibold text-xs text-white uppercase" href="{{ route('posts.edit', $post) }}">
                                Edit
                            </a>
                            <form action="{{route('posts.destroy', $post)}}" method="POST">
                                @csrf
                                @method('delete')
                                <x-danger-button  onclick="return confirm('¿Está seguro que desea eliminar este registro?')">
                                    {{ __('Delete') }}
                                </x-danger-button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <div class="p-9">{{$posts }}</div>
            </div>
        </div>
    </div>
</x-app-layout>
