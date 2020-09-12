<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon()
    {
        $comingSoonUnformatted = Http::withHeaders([
            'user-key' => config('services.igdb.key')
        ])->withOptions([
            'body' => "
                fields name, cover.url, first_release_date, popularity, platforms.abbreviation, rating, rating_count, summary, slug;
                where platforms = (48,49,130,6) 
                & (first_release_date >= " . now()->timestamp . "
                & popularity > 5);
                sort first_release_date asc;
                limit 4;
            "
        ])->get(config('services.igdb.endpoint'))->json();

        $this->comingSoon = $this->formatForView($comingSoonUnformatted);
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }

    protected function formatForView($games)
    {
        return collect($games)->map(function($game) {
            return collect($game)->merge([
                'cover_image_url' => isset($game['cover']) ? Str::replaceFirst('thumb', 'cover_small', $game['cover']['url']) : asset('images/sample-game-cover.png'), 
                'first_release_date' => Carbon::parse($game['first_release_date'])->format('M d, Y'), 
            ]);
        });
    }
}
