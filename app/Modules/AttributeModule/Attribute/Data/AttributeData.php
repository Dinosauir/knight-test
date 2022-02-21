<?php

namespace App\Modules\AttributeModule\Attribute\Data;

use Spatie\LaravelData\Data;

class AttributeData extends Data
{
    public function __construct(
        public string $name,
        public ?int   $value = null,
        public array $relations = []
    )
    {

    }
}
