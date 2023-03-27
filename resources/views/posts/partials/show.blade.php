<x-guest-layout>
    <h3 class="text-md font-bold uppercase">{{$post->title}}</h3>
    <p class="text-sm"> Autor: {{$post->user->name }}</p>
    <p class="pt-3"> {{ $post->content }}</p>
</x-guest-layout>
