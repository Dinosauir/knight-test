<?php

namespace App\Modules\KnightModule\KnightAttribute\Strategies;

use App\Modules\KnightModule\KnightAttribute\Contracts\InterfaceKnightAttributeStrategy;

class StrengthStrategy implements InterfaceKnightAttributeStrategy
{
    public function generateAttribute(int $age = null): int
    {
        $min = 60;
        $part = 41 / 6;

        if (!$age) {
            $age = 20;
        }

        for ($i = 20; $i <= $age; $i++) {
            if ($i === $age) {
                return random_int(floor($min), floor($min + $part));
            }

            $min += $part;
        }
    }
}
