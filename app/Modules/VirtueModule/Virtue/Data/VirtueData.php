<?php

namespace App\Modules\VirtueModule\Virtue\Data;

use Spatie\LaravelData\Data;

class VirtueData extends Data
{
    public function __construct(
        public string $name,
        public ?int   $value = null,
        public array  $relations = []
    )
    {

    }
}
