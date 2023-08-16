<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <form action="{{ route('tweets.update', $tweet->id) }}" method="post">
        @csrf
        @method('put')
        <textarea name="content" class="textarea textarea-ghost w-full" placeholder="Apa yang anda pikirkan">{{ $tweet->content }}</textarea>
        <input type="submit" value="edit" class="btn btn-primary">
    </form>
</x-app-layout>
