<?php

namespace App\Modules\KingdomModule\Kingdom\Data;

use Spatie\LaravelData\Data;

class KingdomData extends Data
{
    public function __construct(public string $name, public array $relations = [])
    {

    }
}
