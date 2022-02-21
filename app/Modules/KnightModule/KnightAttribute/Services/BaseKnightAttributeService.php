<?php

namespace App\Modules\KnightModule\KnightAttribute\Services;

use App\Modules\KnightModule\KnightAttribute\Contracts\InterfaceKnightAttributeStrategy;
use App\Modules\KnightModule\KnightAttribute\Contracts\InterfaceBaseKnightAttributeService;

abstract class BaseKnightAttributeService implements InterfaceBaseKnightAttributeService
{
    private function resolveStrategyName(string $name): string
    {
        $namespace = explode('\\', __NAMESPACE__);
        unset($namespace[array_key_last($namespace)]);
        $namespace[] = 'Strategies\\' . ucfirst($name) . 'Strategy';

        return implode('\\', $namespace);
    }

    protected function getStrategyClass(string $name): InterfaceKnightAttributeStrategy
    {
        return new ($this->resolveStrategyName($name))();
    }

    abstract public function generateAttributes(int $age): array;
}
