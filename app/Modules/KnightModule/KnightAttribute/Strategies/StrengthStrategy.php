<?php

namespace App\Modules\KnightModule\KnightAttribute\Strategies;

class StrengthStrategy extends AgeStrategy
{
    public function generateAttribute(int $age): int
    {
        return $this->generateVirtueHigherForOlder($age);
    }
}
