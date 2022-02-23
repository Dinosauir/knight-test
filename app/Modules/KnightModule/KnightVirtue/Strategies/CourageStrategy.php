<?php

namespace App\Modules\KnightModule\KnightVirtue\Strategies;

class CourageStrategy extends AgeStrategy
{
    public function generateVirtue(int $age): int
    {
        return $this->generateVirtueHigherForOlder($age);
    }
}
