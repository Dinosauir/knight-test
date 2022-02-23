<?php

namespace App\Modules\KnightModule\KnightVirtue\Strategies;

class JusticeStrategy extends AgeStrategy
{
    public function generateVirtue(int $age): int
    {
        return $this->generateVirtueHigherForOlder($age);
    }
}
