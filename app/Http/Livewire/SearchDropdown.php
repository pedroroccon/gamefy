<?php

namespace App\Http\Livewire;

use App\GameDataCollection;
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
            $results = Http::withHeaders(config('services.igdb.auth'))->withBody(
                "
                    search \"{$this->search}\";
                    fields name, slug, cover.url;
                    limit 8;
                ", 'text/plain')
                    ->post(config('services.igdb.endpoint'))
                    ->json();

            $this->results = GameDataCollection::create($results);
        }
        return view('livewire.search-dropdown');
    }
}
