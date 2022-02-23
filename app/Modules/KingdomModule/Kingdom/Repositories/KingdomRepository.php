<?php

namespace App\Modules\KingdomModule\Kingdom\Repositories;

use App\Modules\KingdomModule\Kingdom\Kingdom;

class KingdomRepository
{
    public function getKingdom(string $name = 'Russia'): int
    {
        return Kingdom::firstOrCreate(['name' => $name])->id;
    }
}
