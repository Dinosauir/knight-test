<?php

namespace App\Modules\KnightModule\KnightVirtue\Strategies;

class GenerosityStrategy extends AgeStrategy
{
    public function generateVirtue(int $age): int
    {
        return $this->generateVirtueHigherForYounger($age);
    }
}
