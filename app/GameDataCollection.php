<?php

namespace App;

use Spatie\DataTransferObject\DataTransferObjectCollection;

class GameDataCollection extends DataTransferObjectCollection
{

    public static function create(array $data)
    {
        return collect($data)->map(function($game) {
            return GameData::fromApi($game);
        });
    }

}