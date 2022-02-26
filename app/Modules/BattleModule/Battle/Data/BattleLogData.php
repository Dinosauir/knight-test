<?php

namespace App\Modules\BattleModule\Battle\Data;

use Spatie\LaravelData\Data;

class BattleLogData extends Data
{
    public function __construct(
        public string $action_type,
        public string $action_value,
        public string $battleable_name
    )
    {

    }
}
