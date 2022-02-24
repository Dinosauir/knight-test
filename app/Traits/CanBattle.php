<?php

namespace App\Traits;

use App\Contracts\InterfaceCanBattle;
use App\Modules\AttributeModule\Attribute\Attribute;
use App\Modules\BattleableModule\Battleable\Battleable;
use App\Modules\BattleModule\Battle\BattleLog;
use App\Modules\VirtueModule\Virtue\Virtue;
use Illuminate\Database\Eloquent\Casts\Attribute as Attr;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

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
