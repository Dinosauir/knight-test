<?php

namespace App\Modules\KnightModule\KnightVirtue\Services;

use App\Modules\VirtueModule\Virtue\Virtue;
use Exception;

class KnightVirtueService extends BaseKnightVirtueService
{
    /**
     * @throws Exception
     */
    public function generateVirtues(int $age): array
    {
        if (!Virtue::first()) {
            throw new Exception('There are no virtues created!');
        }

        return Virtue::all()->mapWithKeys(function ($item) use ($age) {
            return [$item->id => ['value' => $this->getStrategyClass($item->name)->generateVirtue($age)]];
        })->toArray();
    }
}
