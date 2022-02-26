<?php

namespace App\Modules\PrincessModule\Princess\Seeders;

use App\Modules\KingdomModule\Kingdom\Kingdom;
use App\Modules\PrincessModule\Princess\Data\PrincessData;
use App\Modules\PrincessModule\Princess\Princess;
use App\Modules\PrincessModule\Princess\Services\PrincessService;
use Illuminate\Database\Seeder;

class PrincessSeeder extends Seeder
{
    public function __construct(private PrincessService $princessService)
    {
    }

    public function run(): void
    {
        Princess::query()->delete();

        $this->princessService->create(new PrincessData('Eliza', Kingdom::first()->id, 'eliza@eliza.com'));
    }
}
