<?php

namespace App\Modules\KnightModule\KnightVirtue\Services;

use App\Modules\VirtueModule\Virtue\Virtue;

class KnightVirtueService extends BaseKnightVirtueService
{
    public function generateVirtues(int $age): array
    {
        try {
            return Virtue::all()->mapWithKeys(function ($item) use ($age) {
                return [$item->id => ['value' => $this->getStrategyClass($item->name)->generateVirtue($age)]];
            })->toArray();
        } catch (\Throwable $e) {
            dd($e->getMessage());
        }
    }
}
