<?php

namespace App\Modules\AttributeModule\Attribute\Services;

use App\Modules\AttributeModule\Attribute\Attribute;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;

class AttributeService extends BaseService
{
    public function getRelationships(): array
    {
        return [];
    }

    public function getModel(?int $id = null): Model
    {
        if ($id) {
            return Attribute::find($id);
        }

        return new Attribute();
    }
}
