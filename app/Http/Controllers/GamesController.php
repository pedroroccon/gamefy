<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $before = now()->subYears(2)->timestamp;
        $after = now()->addMonths(2)->timestamp;
        $later = now()->addMonths(4)->timestamp;
        $current = now()->timestamp;

        $popularGames = Http::withHeaders([
            'user-key' => config('services.igdb.key')
        ])->withOptions([
            'body' => "
                fields name, cover.url, first_release_date, popularity, platforms.abbreviation, rating;
                where platforms = (48,49,130,6) 
                & (first_release_date >= {$before}
                & first_release_date < {$after});
                sort popularity desc;
                limit 12;
            "
        ])->get(config('services.igdb.endpoint'))->json();

        $recentlyReviewed = Http::withHeaders([
            'user-key' => config('services.igdb.key')
        ])->withOptions([
            'body' => "
                fields name, cover.url, first_release_date, popularity, platforms.abbreviation, rating, rating_count, summary;
                where platforms = (48,49,130,6) 
                & (first_release_date >= {$before}
                & first_release_date < {$current}
                & rating_count > 5);
                sort popularity desc;
                limit 3;
            "
        ])->get(config('services.igdb.endpoint'))->json();

        $mostAnticipated = Http::withHeaders([
            'user-key' => config('services.igdb.key')
        ])->withOptions([
            'body' => "
                fields name, cover.url, first_release_date, popularity, platforms.abbreviation, rating, rating_count, summary;
                where platforms = (48,49,130,6) 
                & (first_release_date >= {$current}
                & first_release_date < {$later});
                sort popularity desc;
                limit 4;
            "
        ])->get(config('services.igdb.endpoint'))->json();

        $comingSoon = Http::withHeaders([
            'user-key' => config('services.igdb.key')
        ])->withOptions([
            'body' => "
                fields name, cover.url, first_release_date, popularity, platforms.abbreviation, rating, rating_count, summary;
                where platforms = (48,49,130,6) 
                & (first_release_date >= {$current}
                & popularity > 5);
                sort first_release_date asc;
                limit 4;
            "
        ])->get(config('services.igdb.endpoint'))->json();
        

        return view('index', compact('popularGames', 'recentlyReviewed', 'mostAnticipated', 'comingSoon'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
