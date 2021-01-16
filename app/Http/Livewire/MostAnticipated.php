<?php

namespace App\Http\Livewire;

use App\GameDataCollection;
use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipated()
    {
        $mostAnticipated = Http::withHeaders(config('services.igdb.auth'))->withBody(
            "
                fields name, cover.url, first_release_date, total_rating_count, platforms.abbreviation, rating, rating_count, summary, slug;
                where platforms = (48,49,130,6) 
                & (first_release_date >= " . now()->timestamp . "
                & first_release_date < " . now()->addMonths(2)->timestamp . ");
                sort total_rating_count desc;
                limit 4;
            ", 'text/plain'
        )->post(config('services.igdb.endpoint'))->json();

        $this->mostAnticipated = GameDataCollection::create($mostAnticipated);
    }

    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
