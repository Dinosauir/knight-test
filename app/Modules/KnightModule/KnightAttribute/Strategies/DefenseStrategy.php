<?php

namespace App\Modules\KnightModule\KnightAttribute\Strategies;

class DefenseStrategy extends AgeStrategy
{
    public function generateAttribute(int $age): int
    {
        return $this->generateVirtueHigherForYounger($age);
    }
}
