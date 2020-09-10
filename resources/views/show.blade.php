@extends('layouts.app')

@section('content')
	
    <div class="container mx-auto px-4">
        <div class="game-details border-b border-gray-800 pb-12 flex flex-col lg:flex-row">
            <div class="flex-none">
                <img src="{{ asset('images/sample-game-cover.png') }}" alt="Cover" class="rounded-lg">
            </div>

            <div class="lg:ml-12 lg:mr-32">
                <h2 class="font-semibold text-4xl leading-title mt-1">Sample game title</h2>
                <div class="text-gray-400">
                    <span>Adventure, RPG</span> &middot; 
                    <span>Square Enix</span> &middot; 
                    <span>Playstation 4</span>
                </div>

                <div class="flex flex-wrap items-center mt-8">
                    <div class="flex items-center">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                        </div>
                        <div class="ml-4 text-xs">Member <br>Score</div>
                    </div>
                    <div class="flex items-center ml-12">
                        <div class="w-16 h-16 bg-gray-800 rounded-full">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">92%</div>
                        </div>
                        <div class="ml-4 text-xs">Critic <br>Score</div>
                    </div>

                    <div class="flex items-center space-x-4 mt-4 lg:mt-0 lg:ml-12">
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="#" class="hover:text-gray-400">
                                <i class="fas fa-globe-americas fa-fw"></i>
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="#" class="hover:text-gray-400">
                                <i class="fab fa-instagram fa-fw"></i>
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="#" class="hover:text-gray-400">
                                <i class="fab fa-twitter fa-fw"></i>
                            </a>
                        </div>
                        <div class="w-8 h-8 bg-gray-800 rounded-full flex justify-center items-center">
                            <a href="#" class="hover:text-gray-400">
                                <i class="fab fa-facebook-f fa-fw"></i>
                            </a>
                        </div>
                    </div>

                    <p class="mt-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam molestias odit, fuga voluptates ut blanditiis cupiditate repudiandae perferendis aspernatur obcaecati quasi, numquam recusandae quam omnis vero. Veniam similique amet repudiandae!</p>
                
                    <div class="mt-12">
                        <button class="flex bg-blue-500 text-white font-semibold px-6 py-4 hover:bg-blue-600 rounded transition ease-in-out duration-150">
                            <i class="far fa-play-circle fa-fw mr-4 mt-1"></i> Play Trailer
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="images-container border-b border-gray-800 pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Images</h2>

            <div class="grid grid-cols-1 md:grid-col-s3 lg:grid-cols-3 gap-12 mt-8">
                
                <!-- Just for test -->
                @for ($i = 0; $i < mt_rand(4, 20); $i++)
                <div>
                    <a href="#">
                        <img src="{{ asset('images/sample-game-image.png') }}" alt="Game screenshot" class="hover:opacity-75 transition ease-in-out duration-150 rounded-lg">
                    </a>
                </div>
                @endfor

            </div>
        </div>

        <div class="similar-games-container border-b border-gray-800 pb-12 mt-8">
            <h2 class="text-blue-500 uppercase tracking-wide font-semibold">Similar games</h2>

            <div class="popular-games text-sm grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 xl:grid-cols-6 gap-12 border-b border-gray-800 pb-16">
                <div class="game mt-8">
                    <div class="relative inline-block">
                        <a href="#">
                            <img src="{{ asset('images/sample-game-cover.png') }}" alt="Game cover" class="hover:opacity-75 transition ease-in-out duration-150 rounded-lg">
                        </a>

                        <div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-800 rounded-full -mr-5 -mb-5">
                            <div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
                        </div>
                    </div>
                    <a href="#" class="block text-base font-semibold leading-tight hover:text-gray-400 mt-8">Sample game name</a>

                    <div class="text-gray-400 mt-1">Playstation 4</div>
                </div>
            </div>
        </div>

    </div>
	
@endsection