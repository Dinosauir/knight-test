<?php

namespace App\Contracts;


use Illuminate\Database\Eloquent\Casts\Attribute as Attr;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface InterfaceCanBattle
{
    public function virtueScore(): Attr;

    public function health(): Attr;

    public function defense(): Attr;

    public function battle(): Attr;

    public function strength(): Attr;

    public function attack(self &$defender): float;

    public function virtues(): BelongsToMany;

    public function attributes(): BelongsToMany;
}
