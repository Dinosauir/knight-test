<?php

namespace App\Modules\KnightModule\Knight\Services;

use App\Modules\KingdomModule\Kingdom\Kingdom;
use App\Modules\KingdomModule\Kingdom\Services\KingdomService;
use App\Modules\KnightModule\Knight\Data\KnightData;
use App\Modules\KnightModule\Knight\Knight;
use App\Modules\KnightModule\Knight\Repositories\KnightRepository;
use App\Modules\KnightModule\KnightAttribute\Services\KnightAttributeService;
use App\Modules\KnightModule\KnightVirtue\Services\KnightVirtueService;
use App\Services\BaseService;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JsonException;

class KnightService extends BaseService
{
    public function __construct(
        private KnightRepository       $knightRepository,
        private KnightAttributeService $attributeService,
        private KnightVirtueService    $virtueService,
    )
    {
    }

    /**
     * @throws GuzzleException
     * @throws JsonException
     */
    public function generateKnightsData(): Collection
    {
        $knights = collect();

        foreach ($this->knightRepository->retrieveKnightNames() as $knightName) {
            $age = random_int(20, 25);

            $knights->push(
                new KnightData(
                    name: $knightName,
                    age: $age,
                    relations: [
                        'attributes' => $this->attributeService->generateAttributes($age),
                        'virtues' => $this->virtueService->generateVirtues($age),
                    ],
                    kingdom_id: Kingdom::firstOrCreate(['name' => 'Russia'])->id,
                )
            );
        }

        return $knights;
    }


    public function getRelationships(): array
    {
        return [
            'virtues',
            'attributes'
        ];
    }

    public function getModel(?int $id = null): Model
    {
        if ($id) {
            return Knight::find($id);
        }

        return new Knight();
    }
}
