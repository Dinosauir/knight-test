<?php

namespace Tests\Feature;

use App\Modules\KnightModule\Knight\Services\KnightService;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class KnightTest extends TestCase
{
    private KnightService $knightService;

    public function setUp(): void {
        parent::setUp();

        $this->knightService = $this->app->make(KnightService::class);
    }

    public function test_create_knights(): void
    {
        DB::beginTransaction();

        $knights = collect();
        foreach ($this->knightService->generateKnightsData(10,[25,30],'Taiwan') as $knightData) {
            $knights->push($this->knightService->create($knightData));
        }

        $this->assertSame($knights->count(), 10);

        DB::rollBack();
    }
}
