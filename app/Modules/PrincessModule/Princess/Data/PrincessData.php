<?php

namespace App\Modules\PrincessModule\Princess\Data;

use Spatie\LaravelData\Data;

class PrincessData extends Data
{
    public function __construct(public string $name, public int $kingdom_id, public string $email, public array $relations = [])
    {

    }
}
