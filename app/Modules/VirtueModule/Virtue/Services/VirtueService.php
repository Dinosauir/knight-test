<?php

namespace App\Modules\VirtueModule\Virtue\Services;

use App\Modules\VirtueModule\Virtue\Virtue;
use App\Services\BaseService;
use Illuminate\Database\Eloquent\Model;

class VirtueService extends BaseService
{
    public function getRelationships(): array
    {
        return [];
    }

    public function getModel(?int $id = null): Model
    {
        if ($id && $model = Virtue::find($id)) {
            return $model;
        }

        return new Virtue();
    }
}
