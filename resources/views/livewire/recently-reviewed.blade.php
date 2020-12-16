<div wire:init="loadRecentlyReviewed" class="recently-reviewed-container space-y-12 mt-8">
    @forelse($recentlyReviewed as $game)
        <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
            <div class="relative flex-none">
                <a href="{{ route('games.show', $game['slug']) }}">
                    <img src="{{ $game['cover_image_url'] }}" alt="Game cover" class="transform w-48 hover:opacity-75 hover:scale-110 transition ease-in-out duration-150 rounded-lg">
                </a>

                @if ($game['rating'])
                    <div id="review_{{ $game['slug'] }}" class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full -mr-5 -mb-5">
                    </div>
                @endif
            </div>
        
            <div class="ml-6 lg:ml-12">
                <a href="{{ route('games.show', $game['slug']) }}" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">{{ $game['name'] }}</a>
                <div class="gray-400 mt-1">
                    {{ $game['platforms'] }}
                </div>
                <p class="mt-6 text-gray-400 hidden lg:block">{{ $game['summary'] }}</p>
            </div>
        </div>
    @empty
        @foreach(range(1, 3) as $game)
            <div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
                <div class="relative flex-none">
                    <div class="bg-gray-700 w-32 lg:w-48 h-40 lg:h-56 rounded-lg animate-pulse"></div>
                </div>
            
                <div class="ml-6 lg:ml-12">
                    <div class="block text-lg font-semibold leading-tight text-transparent bg-gray-700 rounded-lg mt-4 animate-pulse inline-block">Loading title</div>
                    <div class="mt-8 space-y-4 hidden lg:block animate-pulse">
                        <span class="text-transparent bg-gray-700 rounded-lg block">Lorem ipsum dolor sit amet consectetur.</span>
                        <span class="text-transparent bg-gray-700 rounded-lg block">Lorem ipsum dolor sit amet consectetur.</span>
                        <span class="text-transparent bg-gray-700 rounded-lg block">Lorem ipsum dolor sit amet consectetur.</span>
                        <span class="text-transparent bg-gray-700 rounded-lg block">Lorem ipsum dolor sit amet consectetur.</span>
                    </div>
                </div>
            </div>
        @endforeach
    @endforelse
</div>

@push('scripts')
	@include('partials.rating', [
		'event' => 'reviewGameWithRatingFetched'
	])
@endpush