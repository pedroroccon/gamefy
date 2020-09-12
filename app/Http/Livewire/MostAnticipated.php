<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Carbon\Carbon;

class MostAnticipated extends Component
{
    public $mostAnticipated = [];

    public function loadMostAnticipated()
    {
        $mostAnticipatedUnformatted = Http::withHeaders([
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

        $this->mostAnticipated = $this->formatForView($mostAnticipatedUnformatted);
    }

    public function render()
    {
        return view('livewire.most-anticipated');
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
