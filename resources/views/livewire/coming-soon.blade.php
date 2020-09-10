<div wire:init="loadComingSoon" class="coming-soon-container space-y-10 mt-8">
	@forelse($comingSoon as $game)
		<div class="game flex">
			<a href="#">
				<img src="{{ isset($game['cover']) ? Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) : asset('images/sample-game-cover.png') }}" alt="Game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150 rounded-lg">
			</a>
			<div class="ml-4">
				<a href="#" class="hover:text-gray-300">{{ $game['name'] }}</a>
				<div class="text-gray-400 text-sm mt-1">{{ Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }}</div>
			</div>
		</div>
	@empty
		<i class="fas fa-spinner fa-spin mr-2"></i> Loading...
	@endforelse
</div>