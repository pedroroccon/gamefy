<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class PopularGames extends Component
{

    public $popularGames = [];

    public function loadPopularGames()
    {
        $popularGamesUnformatted = cache()->remember('popular-games', 7, function() {
            return Http::withHeaders([
                'user-key' => config('services.igdb.key')
            ])->withOptions([
                'body' => "
                    fields name, cover.url, first_release_date, popularity, platforms.abbreviation, rating, slug;
                    where platforms = (48,49,130,6) 
                    & (first_release_date >= " . now()->subYear()->timestamp . "
                    & first_release_date < " . now()->addMonths(6)->timestamp . ");
                    sort popularity desc;
                    limit 12;
                "
            ])->get(config('services.igdb.endpoint'))->json();
        });

        $this->popularGames = $this->formatForView($popularGamesUnformatted);
    }

    public function render()
    {
        return view('livewire.popular-games');
    }

    protected function formatForView($games)
    {
        return collect($games)->map(function($game) {
            return collect($game)->merge([
                'cover_image_url' => isset($game['cover']) ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : asset('images/sample-game-cover.png'), 
                'rating' => isset($game['rating']) ? round($game['rating']) . '%' : null, 
                'platforms' => implode(', ', collect($game['platforms'])->pluck('abbreviation')->toArray()), 
            ]);
        });
    }
}
