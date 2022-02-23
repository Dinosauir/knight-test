<?php

namespace Database\Seeders;

use App\Modules\AttributeModule\Attribute\Seeders\AttributeSeeder;
use App\Modules\KnightModule\Knight\Seeders\KnightSeeder;
use App\Modules\VirtueModule\Virtue\Seeders\VirtueSeeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            AttributeSeeder::class,
            VirtueSeeder::class,
            KnightSeeder::class
        ]);
    }
}
