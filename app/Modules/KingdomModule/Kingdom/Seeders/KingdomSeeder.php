<?php

namespace App\Modules\KingdomModule\Kingdom\Seeders;


use App\Modules\KingdomModule\Kingdom\Data\KingdomData;
use App\Modules\KingdomModule\Kingdom\Services\KingdomService;
use Illuminate\Database\Seeder;

class KingdomSeeder extends Seeder
{
    public function __construct(private KingdomService $kingdomService)
    {
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attributes = [
            ['name' => 'Russia'],
            ['name' => 'defense'],
            ['name' => 'battle'],
        ];

        foreach ($attributes as $attribute) {
            $this->kingdomService->create(KingdomData::from($attribute));
        }
    }
}
