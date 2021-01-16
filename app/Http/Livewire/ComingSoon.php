<?php

namespace App\Http\Livewire;

use App\GameDataCollection;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ComingSoon extends Component
{
    public $comingSoon = [];

    public function loadComingSoon()
    {
        $comingSoon = Http::withHeaders(config('services.igdb.auth'))->withBody(
            "
                fields name, cover.url, first_release_date, platforms.abbreviation, rating, rating_count, summary, slug;
                where platforms = (48,49,130,6) 
                & (first_release_date >= " . now()->timestamp . ");
                sort first_release_date asc;
                limit 4;
            ", 'text/plain'
        )->post(config('services.igdb.endpoint'))->json();

        $this->comingSoon = GameDataCollection::create($comingSoon);
    }

    public function render()
    {
        return view('livewire.coming-soon');
    }
}
