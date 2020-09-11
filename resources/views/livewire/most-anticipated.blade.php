<div wire:init="loadMostAnticipated" class="most-anticipated-container space-y-10 mt-8">
    @forelse($mostAnticipated as $game)
		<div class="game flex">
			<a href="{{ route('games.show', $game['slug']) }}">
				<img src="{{ isset($game['cover']) ? Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) : asset('images/sample-game-cover.png') }}" alt="Game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150 rounded-lg">
			</a>
			<div class="ml-4">
				<a href="{{ route('games.show', $game['slug']) }}" class="hover:text-gray-300">{{ $game['name'] }}</a>
				<div class="text-gray-400 text-sm mt-1">{{ Carbon\Carbon::parse($game['first_release_date'])->format('M d, Y') }}</div>
			</div>
		</div>
    @empty
		@foreach(range(1, 3) as $game)
			<div class="game flex">
				<div class="bg-gray-800 w-16 h-20 flex-none rounded-lg animate-pulse"></div>
				<div class="ml-4">
					<div class="text-transparent bg-gray-700 rounded-lg animate-pulse leading-tight mt-2">Loading title</div>
					<div class="text-transparent bg-gray-700 rounded-lg inline-block text-sm mt-2 animate-pulse">Loading release date</div>
				</div>
			</div>
		@endforeach
    @endforelse
</div>
