<?php

namespace App\Modules\KnightModule\Knight\Seeders;

use App\Modules\KnightModule\Knight\Knight;
use App\Modules\KnightModule\Knight\Services\KnightService;
use Illuminate\Database\Seeder;

class KnightSeeder extends Seeder
{
    public function __construct(private KnightService $knightService)
    {
    }

    public function run(): void
    {
        Knight::query()->delete();
        foreach ($this->knightService->generateKnightsData() as $knight_data) {
            $this->knightService->create($knight_data);
        }
    }
}
