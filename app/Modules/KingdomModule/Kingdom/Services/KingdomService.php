<?php

namespace App\Modules\KingdomModule\Kingdom\Services;

use App\Modules\KingdomModule\Kingdom\Kingdom;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;

class KingdomService extends BaseService
{
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
}
