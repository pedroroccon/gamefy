<div class="game flex">
	<a href="{{ route('games.show', $game->slug) }}">
		<img src="{{ $game->cover_image_url }}" alt="Game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150 rounded-lg">
	</a>
	<div class="ml-4">
		<a href="{{ route('games.show', $game->slug) }}" class="hover:text-gray-300">{{ $game->name }}</a>
		<div class="text-gray-400 text-sm mt-1">{{ ! empty($game->first_release_date) ? $game->first_release_date->format('Y-m-d') : 'Not defined' }}</div>
	</div>
</div>