<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute as Attr;

trait CanBattleAttributes
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
}
