<?php

namespace App\Modules\KnightModule\Knight\Data\Casts;

use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class KnightRelationsDataArrayCaster implements Cast
{
    public function cast(DataProperty $property, mixed $value): array
    {
        if (!is_array($value)) {
            throw new \RuntimeException("Can only cast arrays to Foo");
        }

        return array_map(static fn(array $item) => new $property(...$item),
            $value
        );
    }
}
