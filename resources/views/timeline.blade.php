<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="card-body bg-white">
                <form action="{{ route('tweets.store') }}" method="post">
                    @csrf
                    <textarea name="content" class="textarea textarea-ghost w-full" placeholder="Apa yang anda pikirkan"></textarea>
                    <input type="submit" value="Tweet" class="btn btn-primary">
                </form>
            </div>

            <div class="card my-4 bg-white">
                @foreach ($tweets as $tweet)
                    <div class="card-body">

                        <h1>{{ $tweet->user->email }}</h1>
                        <p>{{ $tweet->content }}</p>
                        <div>
                            <a href="{{ route('tweets.editor', $tweet->id) }}">edit</a>
                            <span>
                                {{ $tweet->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-app-layout>
