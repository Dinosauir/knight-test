<?php

namespace App\Modules\KnightModule\KnightAttribute\Strategies;

use App\Modules\KnightModule\KnightAttribute\Contracts\InterfaceKnightAttributeStrategy;

class DefenseStrategy implements InterfaceKnightAttributeStrategy
{
    public function generateAttribute(?int $age = null): int
    {
        $part = 41 / 6;
        $max = 60 - $part;

        if (!$age) {
            $age = 20;
        }

        for ($i = 20; $i <= $age; $i++) {
            if ($i === $age) {
                return random_int(max(floor($max), 20), floor($max + $part));
            }

            $max -= $part;
        }
    }
}
