<?php

namespace App\Modules\KnightModule\Knight\Data;

use Spatie\LaravelData\Data;

class KnightData extends Data
{
    public function __construct(
        public string $name,
        public int    $age,
        public array  $relations
    )
    {
    }
}
