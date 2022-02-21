<?php

namespace App\Modules\KnightModule\Knight\Data;

use Spatie\LaravelData\Data;

class KnightRelationsData extends Data
{
    public function __construct(
        public ?array $virtues,
        public ?array $attributes
    )
    {
    }
}
