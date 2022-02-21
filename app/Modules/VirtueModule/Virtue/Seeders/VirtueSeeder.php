<?php

namespace App\Modules\VirtueModule\Virtue\Seeders;

use App\Modules\VirtueModule\Virtue\Data\VirtueData;
use App\Modules\VirtueModule\Virtue\Services\VirtueService;
use Illuminate\Database\Seeder;

class VirtueSeeder extends Seeder
{
    public function __construct(private VirtueService $virtueService)
    {
    }

    public function run()
    {
        $virtues = [
            ['name' => 'courage'],
            ['name' => 'justice'],
            ['name' => 'faith'],
            ['name' => 'mercy'],
            ['name' => 'generosity'],
            ['name' => 'hope'],
            ['name' => 'nobility'],
        ];

        foreach ($virtues as $virtue) {
            $this->virtueService->create(VirtueData::from($virtue));
        }
    }
}
