<div class="game mt-8">
    <div class="relative inline-block">
        <a href="{{ route('games.show', $game['slug']) }}">
            <img src="{{ $game['cover_image_url'] }}" alt="Game cover" class="hover:opacity-75 transition ease-in-out duration-150 rounded-lg">
        </a>
        @if ($game['rating'])
            <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full -mr-5 -mb-5">
                <div class="font-semibold text-xs flex justify-center items-center h-full">{{ $game['rating'] }}</div>
            </div>
        @endif
    </div>
    <a href="{{ route('games.show', $game['slug']) }}" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{ $game['name'] }}</a>
    <div class="text-gray-400 mt-1">
        {{ $game['platforms'] }}
    </div>
</div>