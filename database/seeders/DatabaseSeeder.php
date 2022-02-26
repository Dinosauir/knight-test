<?php

namespace Database\Seeders;

use App\Modules\AttributeModule\Attribute\Seeders\AttributeSeeder;
use App\Modules\KingdomModule\Kingdom\Seeders\KingdomSeeder;
use App\Modules\KnightModule\Knight\Seeders\KnightSeeder;
use App\Modules\PrincessModule\Princess\Seeders\PrincessSeeder;
use App\Modules\VirtueModule\Virtue\Seeders\VirtueSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AttributeSeeder::class,
            VirtueSeeder::class,
            KingdomSeeder::class,
            PrincessSeeder::class,
            KnightSeeder::class
        ]);
    }
}
