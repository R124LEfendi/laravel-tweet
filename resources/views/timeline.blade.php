<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <form action="{{ route('tweets.search') }}" method="get">
            @csrf
            <div class="input-group">
                <input type="search" name="search" placeholder="Search…" class="input input-bordered" />
                <button type="submit" class="btn btn-square">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </form>

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
                            @can('update', $tweet)
                                <a href="{{ route('tweets.editor', $tweet->id) }}">edit</a>
                            @endcan
                            <span>
                                {{ $tweet->created_at->diffForHumans() }}
                            </span>
                            @can('delete', $tweet)
                                <form action="{{ route('tweets.destroy', $tweet->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        delete
                                    </button>

                                </form>
                            @endcan
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $tweets->onEachSide(1)->links() }}
        </div>
    </div>
</x-app-layout>
