<?php

namespace App\Modules\KnightModule\KnightVirtue\Contracts;

interface InterfaceKnightVirtueStrategy
{
    public function generateVirtue(int $age): int;
}
