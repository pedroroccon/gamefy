<div class="game mt-8">
    <div class="relative inline-block">
        <a href="{{ route('games.show', $game['slug']) }}">
            <img src="{{ $game['cover_image_url'] }}" alt="Game cover" class="transform hover:scale-110 hover:opacity-75 transition ease-in-out duration-150 rounded-lg">
        </a>
        @if ($game['rating'])
            <div id="{{ $game['slug'] }}" class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full -mr-5 -mb-5 text-sm"></div>

            @push('scripts')
                @include('partials.rating', [
                    'slug' => $game['slug'],
                    'rating' => $game['rating'],
                    'event' => null,
                ])
            @endpush
        @endif
    </div>
    <a href="{{ route('games.show', $game['slug']) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{ $game['name'] }}</a>
    <div class="text-gray-400 mt-1">
        {{ $game['platforms'] }}
    </div>
</div>