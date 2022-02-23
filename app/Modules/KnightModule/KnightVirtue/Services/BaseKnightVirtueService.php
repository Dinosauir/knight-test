<?php

namespace App\Modules\KnightModule\KnightVirtue\Services;


use App\Modules\KnightModule\KnightVirtue\Contracts\InterfaceBaseKnightVirtueService;
use App\Modules\KnightModule\KnightVirtue\Contracts\InterfaceKnightVirtueStrategy;
use App\Modules\KnightModule\KnightVirtue\Strategies\BaseStrategy;
use Illuminate\Support\Facades\Log;

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
        try {
            return new ($this->resolveStrategyName($name))();
        } catch (\Throwable $exception) {
            Log::warning($exception->getMessage());

            return new BaseStrategy();
        }
    }

    abstract public function generateVirtues(int $age): array;
}
