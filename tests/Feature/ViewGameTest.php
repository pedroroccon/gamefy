<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ViewGameTest extends TestCase
{
    /** @test */
    public function the_game_page_shows_correct_game_information()
    {
        
        $this->withoutExceptionHandling();
        
        Http::fake([
            'https://api-v3.igdb.com/games' => Http::response($this->fakeSingleGame())
        ]);
        
        $response = $this->get(route('games.show', 'animal-crossing-new-horizons'))
            ->assertSuccessful()
            ->assertSee('Fake Animal Crossing: New Horizons')
            ->assertSee('Simulator')
            ->assertSee('Nintendo')
            ->assertSee('Switch')
            ->assertSee(90)
            ->assertSee(83)
            ->assertSee('twitter.com/animalcrossing')
            ->assertSee('Escape to a deserted island')
            ->assertSee('//images.igdb.com/igdb/image/upload/t_screenshot_big/sc6lt7.jpg')
            ->assertSee('The Last Journey');

    }
    
    public function fakeSingleGame()
    {
        return [
            0 => [
                "id" => 109462, 
                "aggregated_rating" => 90.181818181818, 
                "cover" => [
                    "id" => 103813, 
                    "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co283p.jpg", 
                ], 
                "first_release_date" => 1584662400, 
                "genres" => [
                    [
                        "id" => 13, 
                        "name" => "Simulator", 
                    ], 
                ], 
                "involved_companies" => [
                    0 => [
                        "id" => 94939, 
                        "company" => [
                            "id" => 70, 
                            "name" => "Nintendo", 
                        ], 
                    ], 
                    1 => [
                        "id" => 94940, 
                        "company" => [
                            "id" => 7902, 
                            "name" => "Nintendo EPD", 
                        ], 
                    ], 
                ], 
                "name" => "Fake Animal Crossing: New Horizons", 
                "platforms" => [
                    0 => [
                        "id" => 130, 
                        "abbreviation" => "Switch"
                    ], 
                ], 
                "popularity" => 15.488051676305, 
                "rating" => 83.993437928026, 
                "screenshots" => [
                    0 => [
                        "id" => 308203, 
                        "alpha_channel" => false, 
                        "animated" => false, 
                        "game" => 109462, 
                        "height" => 1080, 
                        "image_id" => "sc6lt7", 
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc6lt7.jpg", 
                        "width" => 1920, 
                        "checksum" => "fe5ba63a-ef0d-673a-3449-c7cdccbb233b", 
                    ], 
                    1 => [
                        "id" => 308204, 
                        "alpha_channel" => false, 
                        "animated" => false, 
                        "game" => 109462, 
                        "height" => 1080, 
                        "image_id" => "sc6lt8", 
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc6lt8.jpg", 
                        "width" => 1920, 
                        "checksum" => "1b953ec8-1731-fcd2-45b1-29f750ba0839", 
                    ], 
                    2 => [
                        "id" => 377380, 
                        "alpha_channel" => false, 
                        "animated" => false, 
                        "game" => 109462, 
                        "height" => 1080, 
                        "image_id" => "sc836s", 
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc836s.jpg", 
                        "width" => 1920, 
                        "checksum" => "214da9ee-3e9a-4bad-9d05-4162781a9a94", 
                    ], 
                    3 => [
                        "id" => 377381, 
                        "alpha_channel" => false, 
                        "animated" => false, 
                        "game" => 109462, 
                        "height" => 1080, 
                        "image_id" => "sc836t", 
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc836t.jpg", 
                        "width" => 1920, 
                        "checksum" => "ad7c2857-bb0b-7c99-315a-5ea107743cf1", 
                    ], 
                    4 => [
                        "id" => 377382, 
                        "alpha_channel" => false, 
                        "animated" => false, 
                        "game" => 109462, 
                        "height" => 1080, 
                        "image_id" => "sc836u", 
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc836u.jpg", 
                        "width" => 1920, 
                        "checksum" => "90fbbfc7-7474-353a-df74-1392aa7b3f7b", 
                    ], 
                    5 => [
                        "id" => 377383, 
                        "alpha_channel" => false, 
                        "animated" => false, 
                        "game" => 109462, 
                        "height" => 1080, 
                        "image_id" => "sc836v", 
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc836v.jpg", 
                        "width" => 1920, 
                        "checksum" => "955ef387-5383-ad85-057b-10e61c9a82f0", 
                    ], 
                    6 => [
                        "id" => 377384, 
                        "alpha_channel" => false, 
                        "animated" => false, 
                        "game" => 109462, 
                        "height" => 1080, 
                        "image_id" => "sc836w", 
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc836w.jpg", 
                        "width" => 1920, 
                        "checksum" => "86fe9145-a135-10d2-c534-ceb8aeae6659", 
                    ], 
                    7 => [
                        "id" => 377385, 
                        "alpha_channel" => false, 
                        "animated" => false, 
                        "game" => 109462, 
                        "height" => 1080, 
                        "image_id" => "sc836x", 
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc836x.jpg", 
                        "width" => 1920, 
                        "checksum" => "a13defe1-c69e-2b99-bb1e-be29025efde2", 
                    ], 
                    8 => [
                        "id" => 377386, 
                        "alpha_channel" => false, 
                        "animated" => false, 
                        "game" => 109462, 
                        "height" => 1080, 
                        "image_id" => "sc836y", 
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc836y.jpg", 
                        "width" => 1920, 
                        "checksum" => "f1f7dffc-0199-4f5a-b6d7-8dd279c955b9", 
                    ], 
                    9 => [
                        "id" => 385274, 
                        "alpha_channel" => false, 
                        "animated" => false, 
                        "game" => 109462, 
                        "height" => 1080, 
                        "image_id" => "sc89a2", 
                        "url" => "//images.igdb.com/igdb/image/upload/t_thumb/sc89a2.jpg", 
                        "width" => 1920, 
                        "checksum" => "c4ef0418-fa0a-b764-3a2a-909aad6b7869", 
                    ], 
                ], 
                "similar_games" => [
                    0 => [
                        "id" => 28277, 
                        "cover" => [
                            "id" => 68046, 
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/v8qebygfdgzfmjaez55j.jpg", 
                        ], 
                        "name" => "The Last Journey", 
                        "platforms" => [
                            0 => [
                                "id" => 6, 
                                "abbreviation" => "PC", 
                            ], 
                            1 => [
                                "id" => 39, 
                                "abbreviation" => "iOS", 
                            ], 
                        ], 
                        "slug" => "the-last-journey", 
                    ], 
                    1 => [
                        "id" => 36258, 
                        "cover" => [
                            "id" => 74553, 
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1lix.jpg", 
                        ], 
                        "name" => "Order of Battle: World War II", 
                        "platforms" => [
                            0 => [
                                "id" => 6, 
                                "abbreviation" => "PC", 
                            ], 
                            1 => [
                                "id" => 14, 
                                "abbreviation" => "Mac", 
                            ], 
                        ], 
                        "rating" => 80.0, 
                        "slug" => "order-of-battle-world-war-ii", 
                    ], 
                    2 => [
                        "id" => 37419, 
                        "cover" => [
                            "id" => 107550, 
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co2azi.jpg", 
                        ], 
                        "name" => "Dude Simulator", 
                        "platforms" => [
                            0 => [
                                "id" => 6, 
                                "abbreviation" => "PC", 
                            ], 
                        ], 
                        "rating" => 79.911633494131, 
                        "slug" => "dude-simulator", 
                    ], 
                    3 => [
                        "id" => 44242, 
                        "cover" => [
                            "id" => 82669, 
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rsd.jpg", 
                        ], 
                        "name" => "Junkyard Simulator", 
                        "platforms" => [
                            0 => [
                                "id" => 6, 
                                "abbreviation" => "PC", 
                            ], 
                        ], 
                        "slug" => "junkyard-simulator", 
                    ], 
                    4 => [
                        "id" => 51577, 
                        "cover" => [
                            "id" => 82238, 
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rge.jpg", 
                        ], 
                        "name" => "Rise of Industry", 
                        "platforms" => [
                            0 => [
                                "id" => 3, 
                                "abbreviation" => "Linux", 
                            ], 
                            1 => [
                                "id" => 6, 
                                "abbreviation" => "PC", 
                            ], 
                            2 => [
                                "id" => 14, 
                                "abbreviation" => "Mac", 
                            ], 
                        ], 
                        "rating" => 52.162162162162, 
                        "slug" => "rise-of-industry", 
                    ], 
                    5 => [
                        "id" => 65827, 
                        "cover" => [
                            "id" => 97215, 
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co230f.jpg", 
                        ], 
                        "name" => "Bronze Age", 
                        "platforms" => [
                            0 => [
                                "id" => 3, 
                                "abbreviation" => "Linux", 
                            ], 
                            1 => [
                                "id" => 6, 
                                "abbreviation" => "PC", 
                            ], 
                            2 => [
                                "id" => 14, 
                                "abbreviation" => "Mac", 
                            ], 
                        ], 
                        "rating" => 70.0, 
                        "slug" => "bronze-age", 
                    ], 
                    6 => [
                        "id" => 79134, 
                        "cover" => [
                            "id" => 82162, 
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rea.jpg", 
                        ], 
                        "name" => "Ancient Cities", 
                        "slug" => "ancient-cities", 
                    ], 
                    7 => [
                        "id" => 101573, 
                        "cover" => [
                            "id" => 82421, 
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1rlh.jpg", 
                        ], 
                        "name" => "Simstory: Live As You Wish", 
                        "rating" => 44.615383, 
                        "slug" => "simstory-live-as-you-wish", 
                    ], 
                    8 => [
                        "id" => 106279, 
                        "cover" => [
                            "id" => 70048, 
                            "url" => "//images.igdb.com/igdb/image/upload/t_thumb/co1i1s.jpg", 
                        ], 
                        "name" => "Among Trees", 
                        "platforms" => [
                            0 => [
                                "id" => 6, 
                                "abbreviation" => "PC", 
                            ], 
                        ], 
                        "slug" => "among-trees", 
                    ], 
                ], 
                "slug" => "animal-crossing-new-horizons",
                "summary" => "Escape to a deserted island and create your own paradise as you explore, create, and customize in the Animal Crossing: New Horizons game. Your island getaway ha...", 
                "videos" => [
                    0 => [
                        "id" => 28118, 
                        "game" => 109462, 
                        "name" => "Trailer", 
                        "video_id" => "_3YNL0OWio0", 
                        "checksum" => "f8c8c81a-85ae-7720-de31-9a819ac43494", 
                    ], 
                    1 => [
                        "id" => 28119, 
                        "game" => 109462, 
                        "name" => "Gameplay video", 
                        "video_id" => "dEh3MPy4GAU", 
                        "checksum" => "118094df-6c34-2adb-cd17-f19b826cb2ef", 
                    ], 
                    2 => [
                        "id" => 32890, 
                        "game" => 109462, 
                        "name" => "Trailer", 
                        "video_id" => "nCwVTCxm29c", 
                        "checksum" => "283fc290-687f-a7d4-ba58-c11e32a52fca", 
                    ], 
                    3 => [
                        "id" => 35590, 
                        "game" => 109462, 
                        "name" => "Trailer", 
                        "video_id" => "u9TY741PSh8", 
                        "checksum" => "a643d25c-1a82-78bb-edd5-4b193880cc2b", 
                    ], 
                    4 => [
                        "id" => 35591, 
                        "game" => 109462, 
                        "name" => "Trailer", 
                        "video_id" => "KpZyexo-ziA", 
                        "checksum" => "2779278b-13ff-ef6e-5878-075b503c518f", 
                    ], 
                    5 => [
                        "id" => 35592, 
                        "game" => 109462, 
                        "name" => "Trailer", 
                        "video_id" => "aIDu18n3umY", 
                        "checksum" => "5031fdeb-7b75-fadc-2f1d-4fbb3792b9e8", 
                    ], 
                ], 
                "websites" => [
                    0 => [
                        "id" => 116668, 
                        "category" => 1, 
                        "game" => 109462, 
                        "trusted" => false, 
                        "url" => "https://www.nintendo.com/games/detail/animal-crossing-new-horizons-switch/", 
                        "checksum" => "d66c3fef-c1b3-fcc6-0a0d-32092d48935b", 
                    ], 
                    1 => [
                        "id" => 116669, 
                        "category" => 2, 
                        "game" => 109462, 
                        "trusted" => false, 
                        "url" => "https://animalcrossing.fandom.com/wiki/Animal_Crossing:_New_Horizons", 
                        "checksum" => "e7611c98-0e89-a8d5-5a1f-2c25ba88947f", 
                    ], 
                    2 => [
                        "id" => 116670, 
                        "category" => 3, 
                        "game" => 109462, 
                        "trusted" => true, 
                        "url" => "https://en.wikipedia.org/wiki/Animal_Crossing:_New_Horizons", 
                        "checksum" => "77eed75a-544b-57ae-c185-71d334b93e1a", 
                    ], 
                    3 => [
                        "id" => 137604, 
                        "category" => 5, 
                        "game" => 109462, 
                        "trusted" => true, 
                        "url" => "https://twitter.com/animalcrossing", 
                        "checksum" => "e21abe65-d7dc-ba94-d5e4-942218269213", 
                    ], 
                    4 => [
                        "id" => 137605, 
                        "category" => 14, 
                        "game" => 109462, 
                        "trusted" => true, 
                        "url" => "https://www.reddit.com/r/AnimalCrossing", 
                        "checksum" => "5d68df89-7dd8-32e8-979d-4499c2dcb826", 
                    ], 
                    5 => [
                        "id" => 139144, 
                        "category" => 18, 
                        "game" => 109462, 
                        "trusted" => true, 
                        "url" => "https://discordapp.com/invite/qcNyHre", 
                        "checksum" => "ef308e9c-510c-7920-39e5-7cdaf33fc6c5", 
                    ], 
                ], 
            ], 
        ];
    }
}
