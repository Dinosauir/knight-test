<?php

namespace App\Modules\KnightModule\KnightVirtue\Strategies;

class MercyStrategy extends AgeStrategy
{
    public function generateVirtue(int $age): int
    {
        return $this->generateVirtueHigherForYounger($age);
    }
}
