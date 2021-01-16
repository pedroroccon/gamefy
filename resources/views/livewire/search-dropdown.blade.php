<div class="relative" x-data="{ isVisible: true }" @click.away="isVisible = false">
    <input 
        wire:model.debounce.300ms="search"
        type="text" 
        class="bg-gray-800 text-sm rounded-lg focus:outline-none focus:shadow-outline w-64 px-3 pl-12 py-2" 
        placeholder="Search (press '/' to focus)"
        x-ref="search"
        @keydown.window="
            if (event.keyCode === 191) {
                event.preventDefault();
                $refs.search.focus();
            }
        "
        @focus="isVisible = true"
        @keydown.escape.window = "isVisible = false"
        @keydown="isVisible = true"
        @keydown.shift.tab="isVisible = false"
    >
    <div class="absolute top-0 mt-2 flex-items-center h-full ml-4">
        <i class="fas fa-search fa-fw text-gray-400 block"></i>
    </div>

    <div wire:loading class="spinner absolute top-0 right-0 mr-4 mt-2">
        <i class="fas fa-spinner fa-pulse fa-fw"></i>
    </div>

    @if (strlen($search) > $searchLengthBeforeStart)
        <div class="absolute z-50 bg-gray-800 text-xs rounded-lg w-64 mt-2 overflow-hidden" x-show.transition.opacity.duration.200="isVisible">
            @if (count($results) > 0)
                <ul>
                    @foreach($results as $game)
                        <li class="border-b border-gray-700">
                            <a 
                                href="{{ url('/games/' . $game->slug) }}" 
                                class="block hover:bg-gray-700 px-3 py-3 flex items-center transition ease-in-out duration-150"
                                @if ($loop->last) @keydown.tab="isVisible = false" @endif
                            >
                                @if (isset($game->cover))    
                                    <img src="{{ $game->cover_image_url }}" alt="Game Cover" class="w-10 rounded mr-5">
                                @endif
                                <span>{{ $game->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="px-3 py-3 flex">
                    <i class="fas fa-info-circle fa-fw mr-3 mt-1"></i>
                    <span>Sorry, no results found for "{{ $search }}"</span>
                </div>
            @endif
        </div>
    @endif
</div>