<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Spatie\DataTransferObject\DataTransferObject;
use Illuminate\Support\Collection;

class GameData extends DataTransferObject
{

    /**
     * 
     * @var
     */
    public int $id;

    /**
     * 
     * @var 
     */
    public ?float $aggregated_rating;

    /**
     * 
     * @var 
     */
    public ?array $cover;

    /**
     * 
     * @var 
     */
    public ?string $cover_image_url;

    /**
     * 
     * @var 
     */
    public $first_release_date;

    /**
     * 
     * @var 
     */
    public ?string $genres;

    /**
     * 
     * @var 
     */
    public ?string $involved_companies;

    /**
     * 
     * @var 
     */
    public ?string $name;

    /**
     * 
     * @var 
     */
    public ?string $platforms;

    /**
     * 
     * @var 
     */
    public ?float $rating;

    /**
     * 
     * @var 
     */
    public ?Collection $screenshots;

    /**
     * 
     * @var 
     */
    public ?Collection $similar_games;

    /**
     * 
     * @var 
     */
    public ?string $slug = '';

    /**
     * 
     * @var 
     */
    public ?string $summary;

    /**
     * 
     * @var 
     */
    public ?int $total_rating_count;

    /**
     * 
     * @var 
     */
    public ?array $videos;

    /**
     * 
     * @var 
     */
    public ?array $websites;

    public ?string $trailer;

    public ?array $social;

    public ?int $rating_count;

    /**
     * 
     * @return self
     */
    public static function fromApi(array $game): self
    {
        $game['cover_image_url'] = isset($game['cover']) ? Str::replaceFirst('thumb', 'cover_big', $game['cover']['url']) : asset('images/sample-game-cover.png');
        $game['genres'] = isset($game['genres']) ? implode(', ', collect($game['genres'])->pluck('name')->toArray()) : 'Multiple genres';
        $game['first_release_date'] = isset($game['first_release_date']) ? Carbon::parse($game['first_release_date']) : null;
        
        if (isset($game['involved_companies'])) {
            $game['involved_companies'] = $game['involved_companies'][0]['company']['name'];
        }

        $game['platforms'] = isset($game['platforms']) ? implode(', ', collect($game['platforms'])->pluck('abbreviation')->toArray()) : null;
        $game['rating'] = isset($game['rating']) ? round($game['rating']) : 0;
        $game['aggregated_rating'] = isset($game['aggregated_rating']) ? round($game['aggregated_rating']) : 0;
        $game['trailer'] = isset($game['videos']) ? 'https://youtube.com/embed/' . $game['videos'][0]['video_id'] : null;
        
        if (isset($game['screenshots'])) {
            $game['screenshots'] = collect($game['screenshots'])->map(function($screenshot) {
                return [
                    'big' => Str::replaceFirst('thumb', 'screenshot_huge', $screenshot['url']), 
                    'huge' => isset($screenshot['url']) ? Str::replaceFirst('thumb', 'screenshot_big', $screenshot['url']) : asset('images/sample-game-cover.png')
                ];
            })->take(9);
        }

        if (isset($game['similar_games'])) {
            $game['similar_games'] = collect($game['similar_games'])->map(function($game) {
                return self::fromApi($game);
            })->take(6);
        } else {
            $game['similar_games'] = collect(); // Default value
        }

        if (isset($game['websites'])) {
            $game['social'] = [
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
            ];
        }
        
        return new self($game);
    }

} 