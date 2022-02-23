<?php

namespace App\Modules\KingdomModule\Kingdom\Services;

use App\Modules\KingdomModule\Kingdom\Kingdom;
use App\Modules\KingdomModule\Kingdom\Repositories\KingdomRepository;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;

class KingdomService extends BaseService
{
    public function __construct(private KingdomRepository $kingdomRepository)
    {

    }

    public function getRelationships(): array
    {
        return [];
    }

    public function getModel(?int $id = null): Model
    {
        if ($id && $model = Kingdom::find($id)) {
            return $model;
        }

        return new Kingdom();
    }

    public function getKingdom(?string $name = null): int
    {
        return $this->kingdomRepository->getKingdom($name);
    }
}
