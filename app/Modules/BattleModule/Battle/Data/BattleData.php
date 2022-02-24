<?php

namespace App\Modules\BattleModule\Battle\Data;

use Spatie\LaravelData\Data;

class BattleData extends Data
{
    public function __construct(
        public int   $battle_invitation_id,
        public array $relations = []
    )
    {

    }
}
