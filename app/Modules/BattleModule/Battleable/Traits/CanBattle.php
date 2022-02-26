<?php

namespace App\Modules\BattleModule\Battleable\Traits;

use App\Modules\BattleModule\Battleable\Contracts\InterfaceCanBattle;
use Illuminate\Database\Eloquent\Collection;

/**
 * @property float $health
 * @property float $defense
 * @property float $strength
 * @property float $battle
 * @property float $virtue_score
 * @property Collection $attributes
 * @property Collection $virtues
 * @property Collection $battles
 */
trait CanBattle
{
    use CanBattleAttributes;
    use CanBattleRelations;

    public static function boot()
    {
        parent::boot();
        self::deleting(function ($model) {
            $model->battleable()->delete();
        });
    }

    public function attack(InterfaceCanBattle &$defender): float
    {
        $defender->health -= $this->getAttackDamage($defender->defense);

        return $this->getAttackDamage($defender->defense);
    }

    private function getAttackDamage(float $defense): float
    {
        return ($this->strength + ($this->strength * $this->battle) / 100) - $defense;
    }
}
