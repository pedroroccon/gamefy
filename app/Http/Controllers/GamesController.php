<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $game = Http::withHeaders([
            'user-key' => config('services.igdb.key')
        ])->withOptions([
            'body' => "
                fields name, cover.url, first_release_date, popularity, platforms.abbreviation, rating, slug, involved_companies.company.name, genres.name, aggregated_rating, summary, websites.*, videos.*, screenshots.*, similar_games.cover.url, similar_games.name, similar_games.rating, similar_games.platforms.abbreviation, similar_games.slug;
                where slug=\"{$slug}\";
            "
        ])->get(config('services.igdb.endpoint'))->json();

        abort_if( ! $game, 404);

        dump($game);

        $game = $this->formatGameForView($game[0]);
        
        return view('show', compact('game'));
    }

    protected function formatGameForView($game)
    {
        return collect($game)->merge([
            'cover_image_url' => isset($game['cover']) ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : asset('images/sample-game-cover.png'), 
            'genres' => implode(', ', collect($game['genres'])->pluck('name')->toArray()), 
            'involved_companies' => $game['involved_companies'][0]['company']['name'], 
            'platforms' => implode(', ', collect($game['platforms'])->pluck('abbreviation')->toArray()), 
            'rating' => isset($game['rating']) ? round($game['rating']) . '%' : '0%', 
            'aggregated_rating' => isset($game['aggregated_rating']) ? round($game['aggregated_rating']) . '%' : '0%', 
            'trailer' => 'https://youtube.com/watch/' . $game['videos'][0]['video_id'], 
            'screenshots' => collect($game['screenshots'])->map(function($screenshot) {
                return [
                    'big' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']), 
                    'huge' => isset($screenshot['url']) ? Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']) : asset('images/sample-game-cover.png')
                ];
            })->take(9), 
            'similar_games' => collect($game['similar_games'])->map(function($game) {
                return collect($game)->merge([
                    'cover_image_url' => isset($game['cover']) ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : asset('images/sample-game-cover.png'), 
                    'rating' => isset($game['rating']) ? round($game['rating']) . '%' : null, 
                    'platforms' => isset($game['platforms']) ? implode(', ', collect($game['platforms'])->pluck('abbreviation')->toArray()) : null, 
                ]);
            })->take(6), 
            'social' => [
                'website' => collect($game['websites'])->first(), 
                'facebook' => collect($game['websites'])->filter(function ($website) {
                    return Str::contains($website['url'], 'facebook');
                })->first(), 
                'twitter' => collect($game['websites'])->filter(function ($website) {
                    return Str::contains($website['url'], 'twitter');
                })->first(), 
                'instagram' => collect($game['websites'])->filter(function ($website) {
                    return Str::contains($website['url'], 'instagram');
                })->first(), 
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
