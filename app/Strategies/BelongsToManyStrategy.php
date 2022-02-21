<?php

namespace App\Strategies;

use App\Contracts\InterfaceRelationStrategy;
use Illuminate\Database\Eloquent\Model;

class BelongsToManyStrategy implements InterfaceRelationStrategy
{
    public function syncRelationship(Model $model, string $relationship_name, array $data): Model
    {
        $model->$relationship_name()->sync($data);

        return $model;
    }
}
