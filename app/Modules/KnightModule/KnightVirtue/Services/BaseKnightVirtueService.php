<?php

namespace App\Modules\KnightModule\KnightVirtue\Services;


use App\Modules\KnightModule\KnightVirtue\Contracts\InterfaceBaseKnightVirtueService;
use App\Modules\KnightModule\KnightVirtue\Contracts\InterfaceKnightVirtueStrategy;

abstract class BaseKnightVirtueService implements InterfaceBaseKnightVirtueService
{
    private function resolveStrategyName(string $name): string
    {
        $namespace = explode('\\', __NAMESPACE__);
        unset($namespace[array_key_last($namespace)]);
        $namespace[] = 'Strategies\\' . ucfirst($name) . 'Strategy';

        return implode('\\', $namespace);
    }

    protected function getStrategyClass(string $name): InterfaceKnightVirtueStrategy
    {
        return new ($this->resolveStrategyName($name))();
    }

    abstract public function generateVirtues(int $age): array;
}
