<?php

namespace App\Modules\AttributeModule\Attribute\Seeders;

use App\Modules\AttributeModule\Attribute\Attribute;
use App\Modules\AttributeModule\Attribute\Data\AttributeData;
use App\Modules\AttributeModule\Attribute\Services\AttributeService;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    public function __construct(private AttributeService $attributeService)
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
            ['name' => 'strength'],
            ['name' => 'defense'],
            ['name' => 'battle'],
        ];

        foreach ($attributes as $attribute) {
            $this->attributeService->create(AttributeData::from($attribute));
        }
    }
}
