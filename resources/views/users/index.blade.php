<x-app-layout>
    <x-slot name="title">
        Usuarios
    </x-slot>
    <x-slot name="header">
        <div class="flex flex-row items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Gestión de usuarios') }}
            </h2>
            <x-tertiary-button :href="route('users.create')">Create new user</x-tertiary-button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3">Nombre</th>
                                    <th class="px-6 py-3" >Correro electrónico</th>
                                    <th class="px-6 py-3" >Creado</th>
                                    <th class="px-6 py-3">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr class="bg-white border-b dark:text-black">
                                    <td class="px-6 py-4" > {{ $user->name }} </td>
                                    <td class="px-6 py-4" > {{ $user->email }}  </td>
                                    <td class="px-6 py-4" > {{ $user->created_at }}  </td>
                                    <td class="px-6 py-4" >
                                        <div class="flex flex-row space-x-3">
                                            <a class="bg-blue-500 p-2 text-white font-bold uppercase rounded-lg transform transition-all hover:scale-105 hover:shadow-xl" href="{{route('users.show', $user)}}">Posts</a>
                                            <a class="bg-yellow-500 p-2 text-white font-bold uppercase rounded-lg transform transition-all hover:scale-105 hover:shadow-xl" href="{{route('users.edit', $user)}}">Editar</a>
                                            <form action="{{route('users.destroy', $user )}}" method="POST">
                                            @csrf
                                            @method('delete')
                                                <x-danger-button  onclick="return confirm('¿Está seguro que desea eliminar este registro?')">
                                                    {{ __('Eliminar') }}
                                                </x-danger-button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="p-6">
                        {{ $users }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
