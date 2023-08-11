<x-guest-layout>
    <h3 class="text-white text-md font-bold uppercase">{{$post->title}}</h3>
    <p class="text-sm text-white"> Autor: {{$post->user->name }}</p>
    <p class="pt-3 text-white"> {{ $post->content }}</p>
</x-guest-layout>
