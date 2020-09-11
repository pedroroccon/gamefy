<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipated()
    {
        $this->mostAnticipated = Http::withHeaders([
            'user-key' => config('services.igdb.key')
        ])->withOptions([
            'body' => "
                fields name, cover.url, first_release_date, popularity, platforms.abbreviation, rating, rating_count, summary, slug;
                where platforms = (48,49,130,6) 
                & (first_release_date >= " . now()->timestamp . "
                & first_release_date < " . now()->addMonths(6)->timestamp . ");
                sort popularity desc;
                limit 4;
            "
        ])->get(config('services.igdb.endpoint'))->json();
    }

    public function render()
    {
        return view('livewire.most-anticipated');
    }
}
