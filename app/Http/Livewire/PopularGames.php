<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class PopularGames extends Component
{

    public $popularGames = [];

    public function loadPopularGames()
    {
        $this->popularGames = cache()->remember('popular-games', 7, function() {
            return Http::withHeaders([
                'user-key' => config('services.igdb.key')
            ])->withOptions([
                'body' => "
                    fields name, cover.url, first_release_date, popularity, platforms.abbreviation, rating;
                    where platforms = (48,49,130,6) 
                    & (first_release_date >= " . now()->subYear()->timestamp . "
                    & first_release_date < " . now()->addMonths(6)->timestamp . ");
                    sort popularity desc;
                    limit 12;
                "
            ])->get(config('services.igdb.endpoint'))->json();
        });        
    }

    public function render()
    {
        return view('livewire.popular-games');
    }
}
