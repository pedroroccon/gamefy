@extends('layouts.app')
@section('title', $game->name)

@section('content')
	
    <div class="container mx-auto px-4">
        <div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img src="{{ $game->cover_image_url }}" alt="Cover" class="rounded-lg w-64">
            </div>

            <div class="lg:ml-12 lg:mr-64">
                <h2 class="font-semibold text-4xl leading-title mt-1">{{ $game->name }}</h2>
                <div class="text-gray-400">
                    <span>
                        {{ $game->genres }}
                    </span> &middot; 
                    <span>
                        {{ $game->involved_companies }}
                    </span> &middot; 
                    <span>
                     {{ $game->platforms ?? 'Not defined' }}
                    </span>
                </div>

                <div class="flex flex-wrap items-center mt-8">

                    @if($game->rating)
                        <div class="flex items-center">
                            <div id="memberRating" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
                                @push('scripts')
                                    @include('partials.rating', [
                                        'slug' => 'memberRating', 
                                        'rating' => $game->rating, 
                                        'event' => null, 
                                    ])
                                @endpush
                            </div>
                            <div class="ml-4 text-xs">Member <br>Score</div>
                        </div>
                    @endif

                    @if ($game->aggregated_rating)
                        <div class="flex items-center ml-12">
                            <div id="criticScore" class="w-16 h-16 bg-gray-800 rounded-full relative text-sm">
                                @push('scripts')
                                    @include('partials.rating', [
                                        'slug' => 'criticScore', 
                                        'rating' => $game->aggregated_rating, 
                                        'duration' => 2500, 
                                        'event' => null, 
                                    ])
                                @endpush
                            </div>
                            <div class="ml-4 text-xs">Critic <br>Score</div>
                        </div>
                    @endif

                    <div class="flex items-center space-x-4 mt-4 lg:mt-0 lg:ml-12">

                        @if ($game->social['website'])
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{ $game->social['website']['url'] }}" class="hover:text-gray-400" target="_blank">
                                    <i class="fas fa-globe-americas fa-fw"></i>
                                </a>
                            </div>
                        @endif

                        @if ($game->social['instagram'])
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{ $game->social['instagram']['url'] }}" class="hover:text-gray-400" target="_blank">
                                    <i class="fab fa-instagram fa-fw"></i>
                                </a>
                            </div>
                        @endif

                        @if ($game->social['twitter'])
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{ $game->social['twitter']['url'] }}" class="hover:text-gray-400" target="_blank">
                                    <i class="fab fa-twitter fa-fw"></i>
                                </a>
                            </div>
                        @endif

                        @if ($game->social['facebook'])
                            <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                                <a href="{{ $game->social['facebook']['url'] }}" class="hover:text-gray-400" target="_blank">
                                    <i class="fab fa-facebook-f fa-fw"></i>
                                </a>
                            </div>
                        @endif
                    </div>

                    <p class="mt-12">{{ $game->summary }}</p>
                
                    <div class="mt-12" x-data="{ isTrailerModalVisible: false }">
                        <button @click="isTrailerModalVisible = true" class="inline-flex bg-blue-500 text-white font-semibold px-6 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                            <i class="far fa-play-circle fa-fw mr-4 mt-1"></i> Play Trailer
                        </button>

                        <template x-if="isTrailerModalVisible">
                            <div class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto bg-black bg-opacity-75">
                                <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                                    <div class="bg-gray-900 rounded">
                                        <div class="flex justify-end p-4">
                                            <button
                                                @click="isTrailerModalVisible = false"
                                                @keydown.escape.window="isTrailerModalVisible = false"
                                                class="hover:text-gray-300"
                                            >
                                                <i class="far fa-times-circle fa-fw fa-lg"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body px-8 py-8">
                                            <div class="responsive-container overflow-hidden relative" style="padding-top: 56.25%">
                                                <iframe width="560" height="315" class="responsive-iframe absolute top-0 left-0 w-full h-full" src="{{ $game->trailer }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>

        <div class="images-container border-b border-gray-800 pb-12 mt-8" x-data="{ isImageModalVisible: false, image: '' }">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>

            <div class="grid grid-cols-1 md:grid-col-s3 lg:grid-cols-3 gap-12 mt-8">                
                @foreach($game->screenshots as $screenshot)
                    <div>
                        <a
                            href="#" 
                            @click.prevent="
                                isImageModalVisible = true
                                image = '{{ $screenshot['huge'] }}'
                            "
                        >
                            <img src="{{ $screenshot['big'] }}" alt="Game screenshot" class="hover:opacity-75 transition ease-in-out duration-150 rounded-lg">
                        </a>
                    </div>
                @endforeach

            </div>
            <template x-if="isImageModalVisible">
                <div class="z-50 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto bg-black bg-opacity-75">
                    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
                        <div class="bg-gray-900 rounded">
                            <div class="flex justify-end p-4">
                                <button
                                    @click="isImageModalVisible = false"
                                    @keydown.escape.window="isImageModalVisible = false"
                                    class="hover:text-gray-300"
                                >
                                    <i class="far fa-times-circle fa-fw fa-lg"></i>
                                </button>
                            </div>
                            <div class="modal-body px-8 py-8">
                                <img :src="image" alt="screenshot">
                            </div>
                        </div>
                    </div>
                </div>
            </template>

        </div>

        <div class="similar-games-container pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Similar games</h2>

            <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 pb-16">
                @foreach($game->similar_games as $similar)
                    <x-game-card :game="$similar"/>
                @endforeach
            </div>
        </div>

        @push('scripts')
            @include('partials.rating', [
                'event' => 'gameWithRatingFetched'
            ])
        @endpush
    </div>
	
@endsection