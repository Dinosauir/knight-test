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

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Knight::truncate();
        foreach ($this->knightService->generateKnights() as $knight) {
            Knight::create($knight->toArray());
        }

    }
}
