<x-app-layout>
    <x-slot name="title">
        Editar post
    </x-slot>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Editar post') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-3">
                <form action="{{ route('posts.update', $post) }}" method="POST">
                @method('PUT')
                @include('posts.partials._form')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
