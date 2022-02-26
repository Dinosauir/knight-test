<?php

namespace App\Modules\BattleModule\Battleable\Contracts;


use Illuminate\Database\Eloquent\Casts\Attribute as Attr;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

interface InterfaceCanBattle
{
    public function virtueScore(): Attr;

    public function health(): Attr;

    public function defense(): Attr;

    public function battle(): Attr;

    public function strength(): Attr;

    public function virtues(): BelongsToMany;

    public function attributes(): BelongsToMany;

    public function battleable(): MorphOne;

    public function kingdom(): BelongsTo;

    public function attack(self &$defender): float;
}
