@extends('layouts.app')

@section('content')
	
    <div class="container mx-auto px-4">
        <div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img src="{{ $game['cover_image_url'] }}" alt="Cover" class="rounded-lg w-64">
            </div>

            <div class="lg:ml-12 lg:mr-64">
                <h2 class="font-semibold text-4xl leading-title mt-1">{{ $game['name'] }}</h2>
                <div class="text-gray-400">
                    <span>
                        {{ $game['genres'] }}
                    </span> &middot; 
                    <span>
                        {{ $game['involved_companies'] }}
                    </span> &middot; 
                    <span>
                     {{ $game['platforms'] ?? 'Not defined' }}
                    </span>
                </div>

                <div class="flex flex-wrap items-center mt-8">

                    @if($game['rating'])
                        <div class="flex items-center">
                            <div id="memberRating" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
                                @push('scripts')
                                    @include('partials.rating', [
                                        'slug' => 'memberRating', 
                                        'rating' => $game['rating'], 
                                        'event' => null, 
                                    ])
                                @endpush
                            </div>
                            <div class="ml-4 text-xs">Member <br>Score</div>
                        </div>
                    @endif

                    @if ($game['aggregated_rating'])
                        <div class="flex items-center ml-12">
                            <div id="criticScore" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
                                @push('scripts')
                                    @include('partials.rating', [
                                        'slug' => 'criticScore', 
                                        'rating' => $game['aggregated_rating'], 
                                        'duration' => 2500, 
                                        'event' => null, 
                                    ])
                                @endpush
                            </div>
                            <div class="ml-4 text-xs">Critic <br>Score</div>
                        </div>
                    @endif

                    <div class="flex items-center space-x-4 mt-4 lg:mt-0 lg:ml-12">

                        @if ($game['social']['website'])
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{ $game['social']['website']['url'] }}" class="hover:text-gray-400">
                                    <i class="fas fa-globe-americas fa-fw"></i>
                                </a>
                            </div>
                        @endif

                        @if ($game['social']['instagram'])
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{ $game['social']['instagram']['url'] }}" class="hover:text-gray-400">
                                    <i class="fab fa-instagram fa-fw"></i>
                                </a>
                            </div>
                        @endif

                        @if ($game['social']['twitter'])
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{ $game['social']['twitter']['url'] }}" class="hover:text-gray-400">
                                    <i class="fab fa-twitter fa-fw"></i>
                                </a>
                            </div>
                        @endif

                        @if ($game['social']['facebook'])
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{ $game['social']['facebook']['url'] }}" class="hover:text-gray-400">
                                    <i class="fab fa-facebook-f fa-fw"></i>
                                </a>
                            </div>
                        @endif
                    </div>

                    <p class="mt-12">{{ $game['summary'] }}</p>
                
                    <div class="mt-12">
                        <!-- <button class="flex bg-blue-500 text-white font-semibold px-6 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                            <i class="far fa-play-circle fa-fw mr-4 mt-1"></i> Play Trailer
                        </button> -->

                        <a href="{{ $game['trailer'] }}" class="inline-flex bg-blue-500 text-white font-semibold px-6 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                            <i class="far fa-play-circle fa-fw mr-4 mt-1"></i> Play Trailer
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="images-container border-b border-gray-800 pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>

            <div class="grid grid-cols-1 md:grid-col-s3 lg:grid-cols-3 gap-12 mt-8">
                
                <!-- Just for test -->
                @foreach($game['screenshots'] as $screenshot)
                <div>
                    <a href="{{ $screenshot['huge'] }}">
                        <img src="{{ $screenshot['big'] }}" alt="Game screenshot" class="hover:opacity-75 transition ease-in-out duration-150 rounded-lg">
                    </a>
                </div>
                @endforeach

            </div>
        </div>

        <div class="similar-games-container pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Similar games</h2>

            <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 pb-16">
                @foreach($game['similar_games'] as $similar)
                    <x-game-card :game="$similar"/>
                @endforeach
            </div>
        </div>
    </div>
	
@endsection