<?php

namespace Tests\Feature;

use App\Modules\AttributeModule\Attribute\Data\AttributeData;
use App\Modules\AttributeModule\Attribute\Services\AttributeService;
use App\Modules\BattleModule\Battle\Services\BattleService;
use App\Modules\BattleModule\BattleInvitation\BattleInvitation;
use App\Modules\BattleModule\BattleInvitation\BattleInvitationItem;
use App\Modules\BattleModule\BattleInvitation\Services\BattleInvitationService;
use App\Modules\KingdomModule\Kingdom\Data\KingdomData;
use App\Modules\KingdomModule\Kingdom\Kingdom;
use App\Modules\KingdomModule\Kingdom\Services\KingdomService;
use App\Modules\KnightModule\Knight\Services\KnightService;
use App\Modules\PrincessModule\Princess\Data\PrincessData;
use App\Modules\PrincessModule\Princess\Services\PrincessService;
use App\Modules\VirtueModule\Virtue\Data\VirtueData;
use App\Modules\VirtueModule\Virtue\Services\VirtueService;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Collection;
use Tests\TestCase;

class BattleTest extends TestCase
{
    use DatabaseTransactions;

    private BattleInvitationService $battleInvitationService;
    private KnightService $knightService;
    private KingdomService $kingdomService;
    private AttributeService $attributeService;
    private VirtueService $virtueService;
    private PrincessService $princessService;
    private BattleService $battleService;

    public function setUp(): void
    {
        parent::setUp();

        $this->battleInvitationService = $this->app->make(BattleInvitationService::class);
        $this->knightService = $this->app->make(KnightService::class);
        $this->kingdomService = $this->app->make(KingdomService::class);
        $this->attributeService = $this->app->make(AttributeService::class);
        $this->virtueService = $this->app->make(VirtueService::class);
        $this->princessService = $this->app->make(PrincessService::class);
        $this->battleService = $this->app->make(BattleService::class);
    }


    public function test_battle_invitation_create()
    {
        $kingdom = $this->makeKingdom();
        $this->makeAttributes();
        $this->makeVirtues();
        $this->makeKnights($kingdom);
        $this->makePrincess($kingdom);

        $invitation = $this->battleInvitationService->prepareBattle($kingdom);

        $this->assertNotNull($invitation);
    }

    public function test_battle_begin()
    {
        $kingdom = $this->makeKingdom();
        $this->makeAttributes();
        $this->makeVirtues();
        $this->makePrincess($kingdom);
        $this->makeKnights($kingdom);

        $invitation = $this->battleInvitationService->prepareBattle($kingdom);
        $invitation_children = $invitation->children;

        $invitation_children->shift()->setRejectStatus();
        $invitation_children->first()->setAcceptStatus();
        $invitation_children->last()->setAcceptStatus();

        $invitation->setReadyStatus();

        $battle = $this->battleService->findOrCreateBattle($invitation);

        $this->assertTrue($battle->logs->count() > 0 && $invitation->children()->where('status', BattleInvitationItem::STATUSES['accepted'])->count() === 2);
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

    private function makePrincess(Kingdom $kingdom)
    {
        $this->princessService->create(PrincessData::from(['name' => 'Eliza', 'kingdom_id' => $kingdom->id, 'email' => 'eliza@eliza.com']));
    }

}
