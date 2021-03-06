<?php

namespace Tests\Feature;

use App\Modules\AttributeModule\Attribute\Data\AttributeData;
use App\Modules\AttributeModule\Attribute\Services\AttributeService;
use App\Modules\KingdomModule\Kingdom\Data\KingdomData;
use App\Modules\KingdomModule\Kingdom\Kingdom;
use App\Modules\KingdomModule\Kingdom\Services\KingdomService;
use App\Modules\KnightModule\Knight\Services\KnightService;
use App\Modules\VirtueModule\Virtue\Data\VirtueData;
use App\Modules\VirtueModule\Virtue\Services\VirtueService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Collection;
use Tests\TestCase;

class KnightTest extends TestCase
{
    use DatabaseTransactions;

    private KnightService $knightService;
    private KingdomService $kingdomService;
    private AttributeService $attributeService;
    private VirtueService $virtueService;

    public function setUp(): void
    {
        parent::setUp();

        $this->knightService = $this->app->make(KnightService::class);
        $this->kingdomService = $this->app->make(KingdomService::class);
        $this->attributeService = $this->app->make(AttributeService::class);
        $this->virtueService = $this->app->make(VirtueService::class);
    }

    public function test_create_5_knights_with_virtues_and_attributes(): void
    {
        $kingdom = $this->makeKingdom();
        $this->makeAttributes();
        $this->makeVirtues();
        $knights = $this->makeKnights($kingdom);

        $this->assertSame($knights->count(), 5);
    }

    private function makeKingdom(): Kingdom
    {
        return $this->kingdomService->create(KingdomData::from(['name' => 'Testing']));
    }

    private function makeAttributes(): void
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

    private function makeVirtues(): void
    {
        $virtues = [
            ['name' => 'testVirtue']
        ];

        foreach ($virtues as $virtue) {
            $this->virtueService->create(VirtueData::from($virtue));
        }
    }

    private function makeKnights(Kingdom $kingdom): Collection
    {
        $knights = collect();
        foreach ($this->knightService->generateKnightsData($kingdom) as $knightData) {
            $knights->push($this->knightService->create($knightData));
        }

        return $knights;
    }
}
