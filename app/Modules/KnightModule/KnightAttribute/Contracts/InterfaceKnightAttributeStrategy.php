<?php

namespace App\Modules\KnightModule\KnightAttribute\Contracts;

interface InterfaceKnightAttributeStrategy
{
    public function generateAttribute(int $age): int;
}
