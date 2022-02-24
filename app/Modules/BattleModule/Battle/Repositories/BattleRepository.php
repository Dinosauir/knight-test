<?php

namespace App\Modules\BattleModule\Battle\Repositories;

use App\Contracts\InterfaceCanBattle;
use App\Modules\BattleModule\Battle\Battle;

class BattleRepository
{
    public static function createLog(Battle $battle, InterfaceCanBattle $model, string $action_type, float $action_value): void
    {
//        dd($model->battleable->battles());
        $model->battleable->battles()->create([
            'battle_id' => $battle->id,
            'action_type' => $action_type,
            'action_value' => $action_value,
        ]);
    }
}
