<?php

namespace App\Http\Livewire;

use App\GameDataCollection;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {        
        $recentlyReviewed = Http::withHeaders(config('services.igdb.auth'))->withBody(
            "
                fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, rating_count, summary, slug;
                where platforms = (48,49,130,6) 
                & (first_release_date >= " . now()->subMonths(6)->timestamp . "
                & first_release_date < " . now()->timestamp . "
                & rating_count > 5);
                sort total_rating_count desc;
                limit 3;
            ", 'text/plain'
        )->post(config('services.igdb.endpoint'))->json();

        $this->recentlyReviewed = GameDataCollection::create($recentlyReviewed);
        
        collect($this->recentlyReviewed)->filter(function($game) {
            return $game->rating;
        })->each(function($game) {
            $this->emit('reviewGameWithRatingFetched', [
                'slug' => 'review_' . $game->slug, 
                'rating' => $game->rating / 100
            ]);
        });
    }

    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
