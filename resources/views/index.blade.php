@extends('layouts.app')

@section('content')
	
	<div class="container mx-auto px-4">
		<h2 class="text-blue-500 uppercase tracking-wide font-semibold">Popular Games</h2>

		<div class="popular-games text-sm grid grid-cols-6 gap-12 border-b border-gray-800 pb-16">
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
		<div class="flex my-10">
			<div class="recently-reviewed w-3/4 mr-32">
				<h2 class="text-blue-500 uppercase tracking-wide font-semibold">Recently Reviewed</h2>
				<div class="recently-reviewed-container space-y-12 mt-8">
					<div class="game bg-gray-800 rounded-lg shadow-md flex px-6 py-6">
						<div class="relative flex-none">
							<a href="#">
								<img src="{{ asset('images/sample-game-cover.png') }}" alt="Game cover" class="w-48 hover:opacity-75 transition ease-in-out duration-150 rounded-lg">
							</a>

							<div class="absolute bottom-0 right-0 w-16 h-16 bg-gray-900 rounded-full -mr-5 -mb-5">
								<div class="font-semibold text-xs flex justify-center items-center h-full">80%</div>
							</div>
						</div>
					
						<div class="ml-12">
							<a href="#" class="block text-lg font-semibold leading-tight hover:text-gray-400 mt-4">Sample game name</a>
							<text class="gray-400 mt-1">Playstation 4, Xbox One</text>

							<p class="mt-6 text-gray-400">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rerum beatae, deleniti est quos harum omnis sint delectus porro facere quidem, doloremque magnam rem, accusantium blanditiis sequi cum veniam ipsam perferendis.</p>

						</div>
					</div>
				</div>
			</div>
			<div class="game-sidebar w-1/4">
				<h2 class="text-blue-500 uppercase tracking-wide font-semibold">Most anticipated</h2>
				<div class="most-anticipated-container space-y-10 mt-8">
					<div class="game flex">
						<a href="#">
							<img src="{{ asset('images/sample-game-cover.png') }}" alt="Game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150 rounded-lg">
						</a>

						<div class="ml-4">
							<a href="#" class="hover:text-gray-300">Sample game</a>
							<div class="text-gray-400 text-sm mt-1">September 16, 2020</div>
						</div>
					</div>
				</div>

				<h2 class="text-blue-500 uppercase tracking-wide font-semibold mt-8">Coming soon</h2>
				<div class="coming-soon-container space-y-10 mt-8">
					<div class="game flex">
						<a href="#">
							<img src="{{ asset('images/sample-game-cover.png') }}" alt="Game cover" class="w-16 hover:opacity-75 transition ease-in-out duration-150 rounded-lg">
						</a>

						<div class="ml-4">
							<a href="#" class="hover:text-gray-300">Sample game</a>
							<div class="text-gray-400 text-sm mt-1">September 16, 2020</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
@endsection