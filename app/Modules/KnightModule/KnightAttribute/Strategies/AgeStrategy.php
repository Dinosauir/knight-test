<?php

namespace App\Modules\KnightModule\KnightAttribute\Strategies;

use App\Modules\KnightModule\KnightAttribute\Contracts\InterfaceKnightAttributeStrategy;

abstract class AgeStrategy implements InterfaceKnightAttributeStrategy
{
    abstract public function generateAttribute(int $age): int;

    protected function generateVirtueHigherForOlder(int $age, $min_value = 60, $nr_count = 41): int
    {
        $min = $min_value;
        $part = $nr_count / 6;
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

    protected function generateVirtueHigherForYounger(int $age, $max_value = 60, $nr_count = 41): int
    {
        $part = $nr_count / 6;
        $min = $max_value - $part;

        if (!$age) {
            $age = 20;
        }

        for ($i = 20; $i <= $age; $i++) {
            if ($i === $age) {
                return random_int(max(floor($min), 0), floor($min + $part));
            }

            $min -= $part;
        }
    }
}
