<?php

namespace Tests\Feature;

use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\PopularGames;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illumiante\Support\Facades\Http;

class PopularGamesTest extends TestCase
{
    /** @test */
    public function the_game_page_shows_correct_game_information()
    {
        
        // Http::fake([
        //     'https://api-v3.igdb.com/games' => Http::response($this->fakePopularGames())
        // ]);

        // Livewire::test(PopularGames::class)
        //     ->assertSet('popularGames', []);
    }
}