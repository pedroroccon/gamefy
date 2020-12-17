<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class SearchDropdown extends Component
{

    public $search = '';

    public $results = [];

    public $searchLengthBeforeStart = 2;

    public function render()
    {
        if (strlen($this->search) > $this->searchLengthBeforeStart) {
            $resultsUnformatted = Http::withHeaders(config('services.igdb.auth'))->withBody(
                "
                    search \"{$this->search}\";
                    fields name, slug, cover.url;
                    limit 8;
                ", 'text/plain')
                    ->post(config('services.igdb.endpoint'))
                    ->json();

            $this->results = $this->formatForView($resultsUnformatted);
        }
        return view('livewire.search-dropdown');
    }

    protected function formatForView($games)
    {
        return collect($games)->map(function($game) {
            return collect($game)->merge([
                'cover_image_url' => isset($game['cover']) ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : asset('images/sample-game-cover.png'), 
                // 'rating' => isset($game['rating']) ? round($game['rating']) : null, 
                // 'platforms' => implode(', ', collect($game['platforms'])->pluck('abbreviation')->toArray()), 
            ]);
        });
    }
}
