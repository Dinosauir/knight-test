<?php

namespace App\Modules\KnightModule\KnightAttribute\Contracts;

interface InterfaceBaseKnightAttributeService
{
    public function generateAttributes(int $age): array;
}
