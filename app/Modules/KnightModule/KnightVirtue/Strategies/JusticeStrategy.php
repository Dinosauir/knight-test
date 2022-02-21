<?php

namespace App\Modules\KnightModule\KnightVirtue\Strategies;


use App\Modules\KnightModule\KnightVirtue\Contracts\InterfaceKnightVirtueStrategy;

class JusticeStrategy implements InterfaceKnightVirtueStrategy
{
    public function generateVirtue(?int $age = null): int
    {
        return random_int(0, 100);
    }
}
