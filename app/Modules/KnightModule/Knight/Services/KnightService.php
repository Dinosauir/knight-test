<?php

namespace App\Modules\KnightModule\Knight\Services;

use App\Modules\KingdomModule\Kingdom\Kingdom;
use App\Modules\KnightModule\Knight\Data\KnightData;
use App\Modules\KnightModule\Knight\Knight;
use App\Modules\KnightModule\Knight\Repositories\KnightRepository;
use App\Modules\KnightModule\KnightAttribute\Services\KnightAttributeService;
use App\Modules\KnightModule\KnightVirtue\Services\KnightVirtueService;
use App\Services\BaseService;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use JsonException;

class KnightService extends BaseService
{
    public function __construct(
        private KnightRepository       $knightRepository,
        private KnightAttributeService $attributeService,
        private KnightVirtueService    $virtueService
    )
    {
    }

    public function getRelationships(): array
    {
        return [
            'virtues',
            'attributes',
            'battleable'
        ];
    }

    public function getModel(?int $id = null): Model
    {
        if ($id && $model = Knight::find($id)) {
            return $model;
        }

        return new Knight();
    }

    /**
     * @throws GuzzleException
     * @throws JsonException
     * @throws Exception
     */
    public function generateKnightsData(Kingdom $kingdom, int $knights_nr = null, array $age_range = [20, 25]): Collection
    {
        $knights = collect();

        foreach ($this->knightRepository->retrieveKnightNames($knights_nr) as $knightName) {
            $age = random_int($age_range[0], $age_range[1]);

            $knights->push(
                new KnightData(
                    name: $knightName,
                    age: $age,
                    relations: [
                        'attributes' => $this->attributeService->generateAttributes($age),
                        'virtues' => $this->virtueService->generateVirtues($age),
                        'battleable' => ['kingdom_id' => $kingdom->id]
                    ]
                )
            );
        }

        return $knights;
    }
}
