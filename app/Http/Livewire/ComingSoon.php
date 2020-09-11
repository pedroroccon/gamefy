<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon()
    {
        $this->comingSoon = Http::withHeaders([
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
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
