<?php

namespace App\Modules\PrincessModule\Princess\Services;

use App\Modules\PrincessModule\Princess\Princess;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;

class PrincessService extends BaseService
{

    public function getRelationships(): array
    {
        return [

        ];
    }

    public function getModel(?int $id = null): Model
    {
        if ($id && $model = Princess::find($id)) {
            return $model;
        }

        return new Princess();
    }
}
