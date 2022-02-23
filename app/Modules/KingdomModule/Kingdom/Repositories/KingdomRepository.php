<?php

namespace App\Modules\KingdomModule\Kingdom\Repositories;

use App\Modules\KingdomModule\Kingdom\Kingdom;

class KingdomRepository
{
    public static function getKingdomByNameOrCreate(?string $name = null): Kingdom
    {
        return Kingdom::firstOrCreate(['name' => $name ?? 'Russia']);
    }

    public static function getKingdomByIdOrCreate(int $id): Kingdom
    {
        return Kingdom::find($id) ?? self::getKingdomByNameOrCreate();
    }

}
