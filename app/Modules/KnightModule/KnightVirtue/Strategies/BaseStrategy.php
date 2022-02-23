<?php

namespace App\Modules\KnightModule\KnightVirtue\Strategies;

use App\Modules\KnightModule\KnightVirtue\Contracts\InterfaceKnightVirtueStrategy;

class BaseStrategy implements InterfaceKnightVirtueStrategy
{

    public function generateVirtue(int $age): int
    {
        return random_int(0, 100);
    }
}
