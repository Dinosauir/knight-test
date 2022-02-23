<?php

namespace App\Modules\KnightModule\KnightVirtue\Strategies;

use App\Modules\KnightModule\KnightVirtue\Contracts\InterfaceKnightVirtueStrategy;

abstract class AgeStrategy implements InterfaceKnightVirtueStrategy
{
    abstract public function generateVirtue(int $age): int;

    protected function generateVirtueHigherForOlder(int $age, $min_value = 0, $nr_count = 100): int
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

    protected function generateVirtueHigherForYounger(int $age, $max_value = 100, $nr_count = 100): int
    {
        $part = $nr_count / 6;
        $min = $max_value - $part;

        if (!$age) {
            $age = 20;
        }

        for ($i = 20; $i <= $age; $i++) {
            if ($i === $age) {
                return random_int(max(floor($min), 0), max(floor($min + $part), 0));
            }

            $min -= $part;
        }
    }
}
