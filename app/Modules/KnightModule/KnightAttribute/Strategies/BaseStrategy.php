<?php

namespace App\Modules\KnightModule\KnightAttribute\Strategies;

use App\Modules\KnightModule\KnightAttribute\Contracts\InterfaceKnightAttributeStrategy;

class BaseStrategy implements InterfaceKnightAttributeStrategy
{
    public function generateAttribute(int $age): int
    {
        return random_int(0, 100);
    }
}
