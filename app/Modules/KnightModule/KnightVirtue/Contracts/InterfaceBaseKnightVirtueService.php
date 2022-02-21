<?php

namespace App\Modules\KnightModule\KnightVirtue\Contracts;

interface InterfaceBaseKnightVirtueService
{
    public function generateVirtues(int $age): array;
}
