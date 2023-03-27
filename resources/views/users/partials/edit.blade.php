<x-app-layout>
    <x-slot name="title">
        Editar usuario
    </x-slot>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editar usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-3">
                <form action=" {{route('users.update', $user)}}" method="POST">
                    @method('put')
                    @include('users.partials._form')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
