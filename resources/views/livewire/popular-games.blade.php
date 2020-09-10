<div wire:init="loadPopularGames" class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
	@forelse($popularGames as $game)
		<div class="game mt-8">
			<div class="relative inline-block">
				<a href="#">
					<img src="{{ isset($game['cover']) ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : asset('images/sample-game-cover.png') }}" alt="Game cover" class="hover:opacity-75 transition ease-in-out duration-150 rounded-lg">
				</a>
				@if (array_key_exists('rating', $game))
					<div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full -mr-5 -mb-5">
						<div class="font-semibold text-xs flex justify-center items-center h-full">{{ (int) $game['rating'] }}%</div>
					</div>
				@endif
			</div>
			<a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">{{ $game['name'] }}</a>
			<div class="text-gray-400 mt-1">
				@foreach($game['platforms'] as $platform)
					{{ array_key_exists('abbreviation', $platform) ? $platform['abbreviation'] . ', ' : null }} 
				@endforeach
			</div>
		</div>
	@empty
		<div>
			<i class="fas fa-spinner fa-spin mr-2"></i> Loading...
		</div>
	@endforelse
</div>