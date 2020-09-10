<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class RecentlyReviewed extends Component
{
    public $recentlyReviewed = [];

    public function loadRecentlyReviewed()
    {
        $this->recentlyReviewed = Http::withHeaders([
            'user-key' => config('services.igdb.key')
        ])->withOptions([
            'body' => "
                fields name, cover.url, first_release_date, popularity, platforms.abbreviation, rating, rating_count, summary;
                where platforms = (48,49,130,6) 
                & (first_release_date >= " . now()->subYear()->timestamp . "
                & first_release_date < " . now()->timestamp . "
                & rating_count > 5);
                sort popularity desc;
                limit 3;
            "
        ])->get(config('services.igdb.endpoint'))->json();
    }

    public function render()
    {
        return view('livewire.recently-reviewed');
    }
}
