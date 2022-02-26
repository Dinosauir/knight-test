<?php

namespace App\Modules\BattleModule\Battle\Repositories;

use App\Modules\BattleModule\Battle\Battle;
use App\Modules\BattleModule\Battleable\Contracts\InterfaceCanBattle;

class BattleRepository
{
    public static function createLog(Battle $battle, InterfaceCanBattle $model, string $action_type, float $action_value): void
    {
        $model->battleable->battles()->create([
            'battle_id' => $battle->id,
            'action_type' => $action_type,
            'action_value' => $action_value,
        ]);
    }
}
