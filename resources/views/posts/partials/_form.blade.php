@csrf

<div class="w-full h-auto p-6 flex flex-col space-y-9">
    <div>
        <x-input-label for="title" :value="_('Título')"/>
        <x-text-input id="title" name="title" type="text" class="mt-1 block w-full uppercase" required autofocus autocomplete="title" value="{{ old('title', $post->title ) }}" />
        <x-input-error class="mt-2" :messages="$errors->get('title')" />
    </div>
    <div>
        <x-input-label for="slug" :value="_('Slug')"/>
        <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full lowercase" value="{{ old('slug', $post->slug  ) }}" required autofocus autocomplete="slug"/>
        <x-input-error class="mt-2" :messages="$errors->get('slug')" />
    </div>
    <div>
        <x-input-label for="content" :value="_('Contenido')"/>
        <textarea class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" name="content" id="content" rows="30"> {{ old('content', $post->content) }} </textarea>
        <x-input-error class="mt-2" :messages="$errors->get('content')" />
    </div>
    <div class="pt-3 flex space-x-3">
        <x-tertiary-button :href="route('posts.index')">Cancelar</x-tertiary-button>
        <x-primary-button>{{ __('Guardar') }}</x-primary-button>
    </div>
</div>


