<?php

namespace App\Traits;

use App\Contracts\InterfaceCanBattle;
use App\Modules\AttributeModule\Attribute\Attribute;
use App\Modules\VirtueModule\Virtue\Virtue;
use Illuminate\Database\Eloquent\Casts\Attribute as Attr;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property float $health
 * @property float $defense
 * @property float $strength
 * @property float $battle
 * @property float $virtue_score
 * @property Collection $attributes
 * @property Collection $virtues
 */
trait CanBattle
{
    protected function initializeCanBattle(): void
    {
        $this->appends[] = 'virtue_score';
        $this->appends[] = 'health';
        $this->appends[] = 'strength';
        $this->appends[] = 'battle';
        $this->appends[] = 'defense';
    }

    public function virtueScore(): Attr
    {
        return new Attr(
            get: fn() => (float)number_format($this->virtues()->avg('value'), 2),
        );
    }

    public function strength(): Attr
    {
        return new Attr(
            get: fn() => $this->attributes()->where('name', 'strength')->first()->pivot->value
        );
    }

    public function battle(): Attr
    {
        return new Attr(
            get: fn() => $this->attributes()->where('name', 'battle')->first()->pivot->value
        );
    }

    public function defense(): Attr
    {
        return new Attr(
            get: fn() => $this->attributes()->where('name', 'defense')->first()->pivot->value
        );
    }

    public function health(): Attr
    {
        return new Attr(
            get: fn(float $value = null) => $value ?? 100.0,
            set: fn(float $value) => $value,
        );
    }

    public function virtues(): BelongsToMany
    {
        return $this->belongsToMany(Virtue::class)->withPivot('value');
    }

    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(Attribute::class)->withPivot('value');
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
